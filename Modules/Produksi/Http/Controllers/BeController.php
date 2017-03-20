<?php
namespace Modules\Produksi\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Produksi\Models\Produksi,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Produksi
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            return view('produksi::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Produksi::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->produksi); })
            ->editColumn('produksi', function ($r) { return createLink( url(config('produksi.info.alias').'/'.$r->url.'.html'), $r->produksi ); })
            ->editColumn('status', function ($r) { return $r->status=='1' ? trans('global.active') : trans('global.inactive'); })
            ->editColumn('created_at', function ($r) { return formatDate($r->created_at, 5); })
            ->editColumn('updated_at', function ($r) { return $r->updated_at ? formatDate($r->updated_at, 5) : '-'; })
            ->make(true);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Build Form
    |--------------------------------------------------------------------------
    */
    public function form($id='')
    {
        $data = $id ? Produksi::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('produksi::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Produksi(), $id), 
            'message'=> $this->_buildNotification(true)
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Save Data | Insert Or Update
    |--------------------------------------------------------------------------
    */
    function save()
    {
        $input  = Input::except('_token');
        
        $input['url'] = str_slug(trim($input['produksi']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $image = isset($input['image']) ? $input['image'] : null; unset($input['image']);

        $status = $this->_saveData( new Produksi(), [   
            //VALIDATOR
            "produksi" => "required|unique:mod_produksi". ($input['id'] ? ",produksi,".$input['id'] : '')
        ], $input, 'produksi');

        if ( $status && $image )
        {
            $image = $this->_uploadImage($image, 'produksi', ['600x800', '200x300'], $input['url']);
            
            if ( isset($image['600x800']) )
            {
                Produksi::where('id', $status)->update(['image'=>$image['600x800']]);
            }
        }

        $this->clearCache( config('produksi.info.alias').'/'.$input['url'].'.html' );

        return Redirect( BeUrl( config('produksi.info.alias') .(!$status ? ($input['id']?'/edit/'.$input['id']:'/add') : '') ) );
    }
}