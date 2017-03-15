<?php
namespace Modules\Blogspot\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Blogspot\Models\Blogspot,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Blogspot
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            return view('blogspot::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Blogspot::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->judule_blog); })
            ->editColumn('judule_blog', function ($r) { return createLink( url(config('blogspot.info.alias').'/'.$r->url.'.html'), $r->judule_blog ); })
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
        $data = $id ? Blogspot::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('blogspot::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Blogspot(), $id), 
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
        
        $input['url'] = str_slug($input['judule_blog']);
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Blogspot(), [   
            //VALIDATOR
            "judule_blog" => "required|unique:mod_blogspot". ($input['id'] ? ",judule_blog,".$input['id'] : '')
        ], $input, 'judule_blog');
                
        return Redirect( BeUrl( config('blogspot.info.alias') .(!$status ? ($input['id']?'/edit/'.$input['id']:'/add') : '') ) );
    }
}