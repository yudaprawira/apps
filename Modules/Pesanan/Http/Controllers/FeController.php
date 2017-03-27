<?php

namespace Modules\Pesanan\Http\Controllers;

use Redirect, Cookie, Input,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Illuminate\Routing\Controller,
    Modules\Pesanan\Models\Pesanan,
    Modules\Pesanan\Models\PesananDetail,
    Modules\Pesanan\Models\PesananPembeli,
    App\Http\Controllers\FE\BaseController;

class FeController extends BaseController
{
    private $cookieCartName;

    function __construct() {
        parent::__construct();

        $this->cookieCartName  = '_cart_';
    }
    
    /*
    |--------------------------------------------------------------------------
    | KERANJANG
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $this->dataView['cart'] = $this->_getRowItem();

        return view($this->tmpl . 'cart', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */
    public function checkout()
    {
        $this->dataView['cart'] = $this->_getRowItem();

        if ( !$this->dataView['cart'] ) return Redirect(url('keranjang'));

        return view($this->tmpl . 'checkout', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT SAVE
    |--------------------------------------------------------------------------
    */
    public function save()
    {
        $cart = $this->_getRowItem();

        if ( !$cart ) return Redirect(url('keranjang'));

        $input = Input::except('_token');
        
        $validator = \Validator::make($input, [   
            //VALIDATOR
            "nama_pembeli" => "required",
            "email_pembeli" => "required|email",
            "alamat_pembeli" => "required",
            "provinsi_pembeli" => "required",
            "kota_pembeli" => "required",
            "telepon_pembeli" => "required",
            "nama_penerima" => "required",
            "email_penerima" => "email",
            "alamat_penerima" => "required",
            "provinsi_penerima" => "required",
            "kota_penerima" => "required",
            "telepon_penerima" => "required",
        ]);
        
        if($validator->fails())
        {
            $status = false;
            $this->setValidator($validator->messages(), 'danger', 'center');
        }
        else
        {
            $dataTrans = [
                'invoice' => createInvoice(),
                'tanggal' => dateSQL(),
                'subtotal' => val($cart, 'total.harga'),
                'ongkir' => 0,
                'total' => val($cart, 'total.harga'),
                'ststus_pesanan' => 'BARU',
            ];
            if ( $input['pesanan_id'] = Pesanan::insertGetId($dataTrans) )
            {
                //insert Pembeli
                PesananPembeli::insert($input);

                //inputTrans Detail
                foreach( $cart['data'] as $itemID=>$item )
                {
                    $dataDetail = [
                        'pesanan_id' => $input['pesanan_id'],
                        'item_id' => $itemID,
                        'harga' => $item['harga'],
                        'qty' => $item['qty'],
                        'berat' => $item['berat'],
                        'subtotal' => $item['subtotal'],
                    ];
                    //insert Detail
                    PesananDetail::insert($dataDetail);
                }
                $status = true;

                //REMOVE cart
                $this->clear();
            }
        }

        return Response()->json([ 
            'status'  => $status, 
            'message' => $this->_buildNotification(true),
            'redirect'=> $status ? url('keranjang/terima-kasih') : url('keranjang/proses')
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    */
    public function api()
    {
        $data = $this->_getRowItem();

        $data['total']['qty_format'] = formatNumber($data['total']['qty']);
        $data['total']['harga_format'] = formatNumber($data['total']['harga'], 0, true);

        return response(json_encode($data, JSON_PRETTY_PRINT))
                ->header('Content-Type', 'application/json');
    }

    /*
    |--------------------------------------------------------------------------
    | CLEAR
    |--------------------------------------------------------------------------
    */
    public function clear()
    {
        return $this->_update(null, 0, 'clear');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function upd($category, $url)
    {
        $row = $this->_validateRow($url);

        if ( val($_GET, 'qty') )
        {
            return $this->_update($row['id'], val($_GET, 'qty'), 'upd');
        }
        else if ( val($_GET, 'del') )
        {
            return $this->_update($row['id'], $row['id'], 'del');
        }
        else
        {
            return $this->_update($row['id']);
        }
    }

    
    /*
    |--------------------------------------------------------------------------
    | KERANJANG
    |--------------------------------------------------------------------------
    */
    private function _update($id, $qty=1, $act='add')
    {
        $dataCart = Cookie::has($this->cookieCartName) ? json_decode(Cookie::get($this->cookieCartName), true) : [];

        if ( $act=='add' )
        {
            if( isset($dataCart[$id]) )
            {
                $dataCart[$id]+=$qty;
            }
            else
            {
                $dataCart[$id] = $qty;
            }
        }
        elseif ( $act=='upd' )
        {
            $dataCart[$id] = $qty;
        }  
        elseif ( $act=='del' )
        {
            unset($dataCart[$id]);
        }
        elseif ( $act=='clear' )
        {
            $dataCart = [];
        }
        Cookie::queue($this->cookieCartName, json_encode($dataCart));

        $this->clearCache('keranjang');
        $this->clearCache('keranjang/api');
        
        return Redirect(url('keranjang'));
    }

    /*
    |--------------------------------------------------------------------------
    | GET ITEM
    |--------------------------------------------------------------------------
    */
    private function _getRowItem()
    {
        $dataCart = Cookie::has($this->cookieCartName) ? json_decode(Cookie::get($this->cookieCartName), true) : [];
        
        if ($row = getBook()->select('id', 'title', 'image', 'url', 'harga', 'harga_sebelum', 'berat', 'tersedia')->whereIn('id', array_keys($dataCart))->get()->toArray())
        {
            $ret = ['total'=>['item'=>0, 'qty'=>0, 'harga'=>0, 'berat'=>0]];

            foreach( $row as $c )
            {
                $c['qty'] = val($dataCart, $c['id']);

                $c['subtotal'] = val($dataCart, $c['id']) * $c['harga'];

                $ret['total']['qty'] += val($dataCart, $c['id']); 
                
                $ret['total']['harga'] += $c['subtotal'];

                $ret['total']['berat'] += val($dataCart, $c['id']) * $c['berat']; 

                $ret['total']['item']++; 

                $ret['data'][$c['id']] = $c;
            }

            return $ret;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATE ROW
    |--------------------------------------------------------------------------
    */
    private function _validateRow($url)
    {
        if ($row = getBook()->where('url', $url)->first())
        {
            return $row->toArray();
        }
        else
            return Redirect(url('keranjang'));
    }

}
