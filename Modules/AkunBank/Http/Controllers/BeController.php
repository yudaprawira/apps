<?php
namespace Modules\AkunBank\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\AkunBank\Models\AkunBank,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management AkunBank
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            $this->dataView['form'] = $this->form();
            
            return view('akunbank::index', $this->dataView);
        }
        else
        {
            return Datatables::of(AkunBank::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->nama); })
            ->editColumn('nama', function ($r) { return createLink( url(config('akunbank.info.alias').'/'.$r->url.'.html'), $r->nama ); })
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
        $data = $id ? AkunBank::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('akunbank::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new AkunBank(), $id), 
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
        
        $input['url'] = str_slug(trim($input['nama']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new AkunBank(), [   
            //VALIDATOR
            "nama" => "required|unique:mod_akunbank". ($input['id'] ? ",nama,".$input['id'] : '')
        ], $input, 'nama');

        $this->clearCache( config('akunbank.info.alias').'/'.$input['url'].'.html' );
                
        return Response()->json([ 
            'status' => $status, 
            'message'=> $this->_buildNotification(true),
            'form'   => $status ? base64_encode($this->form()) : null
        ]);
    }
}