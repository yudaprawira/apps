<?php
namespace Modules\___PT___\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\___PT___\Models\___PT___,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management ___PT___
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            return view('___SC___::index', $this->dataView);
        }
        else
        {
            return Datatables::of(___PT___::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->___FIELD_NAME___); })
            ->editColumn('___FIELD_NAME___', function ($r) { return createLink( url(config('___SC___.info.alias').'/'.$r->url.'.html'), $r->___FIELD_NAME___ ); })
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
        $data = $id ? ___PT___::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('___SC___::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new ___PT___(), $id), 
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
        
        $input['url'] = str_slug(trim($input['___FIELD_NAME___']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new ___PT___(), [   
            //VALIDATOR
            "___FIELD_NAME___" => "required|unique:mod____SC___". ($input['id'] ? ",___FIELD_NAME___,".$input['id'] : '')
        ], $input, '___FIELD_NAME___');

        $this->clearCache( config('___SC___.info.alias').'/'.$input['url'].'.html' );

        return Redirect( BeUrl( config('___SC___.info.alias') .(!$status ? ($input['id']?'/edit/'.$input['id']:'/add') : '') ) );
    }
}