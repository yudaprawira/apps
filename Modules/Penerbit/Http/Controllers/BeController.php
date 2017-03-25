<?php
namespace Modules\Penerbit\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Penerbit\Models\Penerbit,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Penerbit
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            $this->dataView['form'] = $this->form();
            
            return view('penerbit::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Penerbit::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->penerbit); })
            ->editColumn('penerbit', function ($r) { return createLink( url(config('penerbit.info.alias').'/'.$r->url.'.html'), $r->penerbit ); })
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
        $data = $id ? Penerbit::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('penerbit::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Penerbit(), $id), 
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
        
        $input['url'] = str_slug(trim($input['penerbit']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Penerbit(), [   
            //VALIDATOR
            "penerbit" => "required|unique:mod_penerbit". ($input['id'] ? ",penerbit,".$input['id'] : '')
        ], $input, 'penerbit');

        $this->clearCache( config('penerbit.info.alias').'/'.$input['url'].'.html' );
                
        return Response()->json([ 
            'status' => $status, 
            'message'=> $this->_buildNotification(true),
            'form'   => $status ? base64_encode($this->form()) : null
        ]);
    }
}