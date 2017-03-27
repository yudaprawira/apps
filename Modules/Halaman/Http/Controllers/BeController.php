<?php
namespace Modules\Halaman\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Halaman\Models\Halaman,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Halaman
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            return view('halaman::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Halaman::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->title); })
            ->editColumn('title', function ($r) { return createLink( url(config('halaman.info.alias').'/'.$r->url.'.html'), $r->title ); })
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
        $data = $id ? Halaman::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('halaman::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Halaman(), $id), 
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
        
        $input['url'] = str_slug(trim($input['title']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Halaman(), [   
            //VALIDATOR
            "title" => "required|unique:mod_halaman". ($input['id'] ? ",title,".$input['id'] : ''),
            "title" => "required"
        ], $input, 'title');

        $this->clearCache( config('halaman.info.alias').'/'.$input['url'].'.html' );

        return Redirect( BeUrl( config('halaman.info.alias') .(!$status ? ($input['id']?'/edit/'.$input['id']:'/add') : '') ) );
    }
}