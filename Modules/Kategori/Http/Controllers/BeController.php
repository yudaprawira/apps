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
            $categories = getRowArray(Kategori::where('induk', '0')->get(), 'id', 'kategori');

            return Datatables::of(Kategori::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->kategori); })
            ->editColumn('kategori', function ($r) use($categories) { return createLink( url('book/'.(isset($categories[$r->induk]) ? str_slug($categories[$r->induk]).'/': '').$r->url), $r->kategori ); })
            ->editColumn('induk', function ($r) use($categories) { return isset($categories[$r->induk]) ? $categories[$r->induk] : '-'; })
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

        $this->dataView['category'] = getRowArray(Kategori::where('induk', '0')->get(), 'id', 'kategori');

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
        
        $input['url'] = str_slug(trim($input['kategori']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Kategori(), [   
            //VALIDATOR
            "kategori" => "required|unique:mod_kategori". ($input['id'] ? ",kategori,".$input['id'] : '')
        ], $input, 'kategori');

        $this->clearCache( config('kategori.info.alias').'/'.$input['url'] );
                
        return Response()->json([ 
            'status' => $status, 
            'message'=> $this->_buildNotification(true),
            'form'   => $status ? base64_encode($this->form()) : null
        ]);
    }
}