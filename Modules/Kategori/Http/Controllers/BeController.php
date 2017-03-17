<?php
namespace Modules\Kategori\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Kategori\Models\Kategori,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Kategori
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            $this->dataView['form'] = $this->form();
            
            return view('kategori::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Kategori::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->name); })
            ->editColumn('name', function ($r) { return createLink( url(config('kategori.info.alias').'/'.$r->url.'.html'), $r->name ); })
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
        $data = $id ? Kategori::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('kategori::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Kategori(), $id), 
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
        
        $input['url'] = str_slug($input['name']);
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Kategori(), [   
            //VALIDATOR
            "name" => "required|unique:mod_kategori". ($input['id'] ? ",name,".$input['id'] : '')
        ], $input, 'name');

        //clear cache
        $cacheKey = config('kategori.info.alias').'/'.$input['url'].'.html';
        if(\Cache::has($cacheKey)) 
        {
            \Cache::forget($cacheKey); 
        }
                
        return Response()->json([ 
            'status' => $status, 
            'message'=> $this->_buildNotification(true),
            'form'   => $status ? base64_encode($this->form()) : null
        ]);
    }
}