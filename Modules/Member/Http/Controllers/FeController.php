<?php

namespace Modules\Member\Http\Controllers;

use Redirect, Input, Hash,
    Session,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Illuminate\Routing\Controller,
    Modules\Member\Models\Member,
    Modules\Pesanan\Models\Pesanan,
    Modules\Pesanan\Models\PesananDetail,
    Modules\Pesanan\Models\PesananPembeli,
    Modules\Pesanan\Models\PesananKonfirmasi,
    App\Http\Controllers\FE\BaseController;

class FeController extends BaseController
{
    var $isLogin;
    var $rdrLogin;

    function __construct() {
        parent::__construct();

        $this->isLogin = Session::has('member_id') ? true : false;
        $this->rdrLogin = redirect(url('member/login'.(val($_GET, 'next') ? '?next='.urlencode(val($_GET, 'next')) : '?next='.urlencode($_SERVER['APP_URL'].$_SERVER['REQUEST_URI']))));
    }

    /*
    |--------------------------------------------------------------------------
    | MEMBER DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function index($path='')
    {
        if ( !$this->isLogin ) return $this->rdrLogin;

        $this->dataView['member_content'] = $this->_memberContent($path);

        return view($this->tmpl . 'member/main', $this->dataView);
    }
    /*
    |--------------------------------------------------------------------------
    | HISTORY TRANSACTION
    |--------------------------------------------------------------------------
    */
    public function historyTrans()
    {
        if ( !$this->isLogin ) return $this->rdrLogin;
            
        if ( val($_GET, 'inv') )
        {
            $this->dataView['row'] = Pesanan::where('member_id', Session::get('member_id'))
                                            ->join('mod_pesanan_pembeli', 'mod_pesanan.id', '=', 'mod_pesanan_pembeli.pesanan_id')
                                            ->with('detail')
                                            ->where('invoice', val($_GET, 'inv'))
                                            ->first();  
            if ( !$this->dataView['row'] ) abort(404);

            $this->dataView['rowConfirm'] = PesananKonfirmasi::where('pesanan_id', val($this->dataView['row'], 'id'))->with('bank')->first();                        

            $this->dataView['title'] = 'INVOICE '.val($this->dataView['row'], 'invoice').' | '.config('app.title');

            return $this->index('detail-transaksi');
        }
        else
        {
            $this->dataView['title'] = 'Histori Transaksi | '.config('app.title');

            $this->dataView['limit_per_page'] = 15;
            $this->dataView['trans'] = Pesanan::where('member_id', Session::get('member_id'))
                                            ->join('mod_pesanan_pembeli', 'mod_pesanan.id', '=', 'mod_pesanan_pembeli.pesanan_id')
                                            ->orderBy('mod_pesanan.id', 'DESC')
                                            ->paginate($this->dataView['limit_per_page']);
            return $this->index('histori-transaksi');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MEMBER CONTENT
    |--------------------------------------------------------------------------
    */
    private function _memberContent($path)
    {
        if ( $path )
        {
            return view($this->tmpl . 'member/' .$path, $this->dataView);
        }
        else
        {
            $this->dataView['title'] = 'DASHBOARD | ' . config('app.title');

            return view($this->tmpl . 'member/profile', $this->dataView);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout()
    {
        $this->_setMemberSession(null, 'del');

        return $this->rdrLogin;
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    public function login()
    {
        if ( $this->isLogin ) return redirect( (val($_GET, 'next') ? urldecode(val($_GET, 'next')) : url('member')) );

        $this->dataView['title'] = 'Member Login | '.config('app.title');

        return view($this->tmpl . 'member/login', $this->dataView);
    }
    public function doLogin()
    {
        if ( $this->isLogin ) return ['status'=>true];

        $status = false;
        $input  = Input::except('_token');

        $validator = \Validator::make($input, [   
            //VALIDATOR
            "username" => "required",
            "password" => "required"
        ]);

        if($validator->fails())
        {
            $this->setValidator($validator->messages(), 'danger', 'center');
        }
        else
        {
            $rowMember = Member::where(function($q) use($input){
                $q->orWhere('url', $input['username']);
                $q->orWhere('email', $input['username']);
            })->first();

            if ( $rowMember )
            {
                if ( $rowMember->status==1 )
                {
                    if (Hash::check(Input::get('password'), $rowMember->password))
                    {
                        $status = true; $this->_setMemberSession($rowMember);

                        $this->setNotif(trans('member::global.successlogin', ['name'=>ucwords($rowMember->nama)]), 'success', 'center');
                    }
                    else
                    {
                        $this->setNotif(trans('member::global.failedlogin'), 'danger', 'center');
                    }
                }
                else
                {
                    $this->setNotif(trans('member::global.notactive', ['name'=>ucwords($rowMember->nama)]), 'danger', 'center');
                }
            }
            else
            {
                $this->setNotif(trans('member::global.notfoundmember', ['name'=>$input['username']]), 'danger', 'center');
            }
        }

        return Response()->json([ 
            'status'  => $status, 
            'message' => $this->_buildNotification(true),
            'redirect'=> $status ? urldecode(val($input, '_next')) : null
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */
    public function register()
    {
        if ( $this->isLogin ) return redirect( (val($_GET, 'next') ? urldecode(val($_GET, 'next')) : url('member')) );
        
        $this->dataView['title'] = 'Member Register | '.config('app.title');
        
        return view($this->tmpl . 'member/register', $this->dataView);
    }
    public function doRegister()
    {
        if ( $this->isLogin ) return ['status'=>true];

        $status = false;
        $input  = Input::except('_token');

        $validator = \Validator::make($input, [   
            //VALIDATOR
            "nama" => "required",
            "email" => "required|email|unique:mod_member",
            "alamat" => "required",
            "provinsi" => "required",
            "kota" => "required",
            "telepon" => "required",
            "ulangi_password"  => "same:password",
        ]);

        if($validator->fails())
        {
            $this->setValidator($validator->messages(), 'danger', 'center');
        }
        else
        {
            $post = $input;
            unset($post['_next']);
            unset($post['ulangi_password']);

            $post['password'] = Hash::make($input['password']);

            if ( $memberID = Member::insertGetId($post) )
            {
                $status = true;
                $this->setNotif(trans('member::global.successregister', ['name'=>ucwords($input['nama'])]), 'success', 'center');
                
                $this->_setMemberSession(Member::where('id', $memberID)->first());
            }
            else
            {
                $this->setNotif(trans('member::global.failedregister', ['name'=>ucwords($input['nama'])]), 'danger', 'center');
            }
        }

        return Response()->json([ 
            'status'  => $status, 
            'message' => $this->_buildNotification(true),
            'redirect'=> $status ? urldecode(val($input, '_next')) : null
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SET SESSION
    |--------------------------------------------------------------------------
    */
    public function _setMemberSession($obj, $act='set')
    {
        $allowed = ['id', 'nama', 'url', 'email', 'alamat', 'provinsi', 'kota', 'telepon', 'kodepos', 'image', 'lastlogin'];
            
        foreach( $allowed as $k )
        {
            if ( $act=='set' )
            {
                Session::put('member_'.$k, $obj->$k);
            }
            else
            {
                Session::forget('member_'.$k);
            }
        }

        if ($act=='set')
        {
            Member::where('id', $obj->id)->update(['lastlogin'=>dateSQL(), 'hash'=>md5(rand().time().$obj->id)]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */
    public function doUpdate()
    {
        if ( !$this->isLogin ) return ['status'=>true];

        $status = false; $isUpdate = true;
        $input  = Input::except('_token');

        //validate old password
        if ( $input['password_lama'] || $input['password']  || $input['ulangi_password']   )
        {
            if ( $input['password'] == $input['ulangi_password'] )
            {
                $rowMember = Member::where('id', Session::get('member_id'))->first();

                if ( $rowMember )
                {
                    if (!Hash::check(Input::get('password_lama'), $rowMember->password))
                    {
                        $this->setNotif(trans('member::global.incorrectoldpassword'), 'danger', 'center');

                        $isUpdate = false;
                    }
                }
                else
                {
                    $this->setNotif(trans('member::global.notfoundmember', ['name'=>$input['username']]), 'danger', 'center');

                    $isUpdate = false;
                }   
            }
            else
            {
                $this->setNotif(trans('member::global.passwordnotmatch'), 'danger', 'center');

                $isUpdate = false;
            }
        }
        
        if ( $isUpdate )
        {
            $validator = \Validator::make($input, [   
                //VALIDATOR
                "nama" => "required",
                "email" => "required|email|unique:user". (Session::get('member_id') ? ",id,.".Session::get('member_id') : ''),
                "alamat" => "required",
                "provinsi" => "required",
                "kota" => "required",
                "telepon" => "required",
                "ulangi_password"  => "same:password",
            ]);

            if($validator->fails())
            {
                $this->setValidator($validator->messages(), 'danger', 'center');
            }
            else
            {
                $post = $input;
                unset($post['_next']);
                unset($post['password_lama']);
                unset($post['ulangi_password']);

                if ( $post['password'] )
                    $post['password'] = Hash::make($post['password']);
                else
                    unset($post['password']);

                if ( $memberID = Member::where('id', Session::get('member_id'))->update($post) )
                {
                    $status = true;
                    $this->setNotif(trans('member::global.successupdate', ['name'=>ucwords($input['nama'])]), 'success', 'center');
                    
                    $this->_setMemberSession(Member::where('id', $memberID)->first());
                }
                else
                {
                    $this->setNotif(trans('member::global.failedupdate', ['name'=>ucwords($input['nama'])]), 'danger', 'center');
                }
            }
        }

        return Response()->json([ 
            'status'  => $status, 
            'message' => $this->_buildNotification(true),
            'redirect'=> $status ? urldecode(val($input, '_next')) : null
        ]);
    }

}
