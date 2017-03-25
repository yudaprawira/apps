<?php
namespace Modules\Pengarang\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Pengarang\Models\Pengarang,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Pengarang
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            $this->dataView['form'] = $this->form();
            
            return view('pengarang::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Pengarang::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->pengarang); })
            ->editColumn('pengarang', function ($r) { return createLink( url(config('pengarang.info.alias').'/'.$r->url.'.html'), $r->pengarang ); })
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
        $data = $id ? Pengarang::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('pengarang::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Pengarang(), $id), 
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
        $image  = $input['file'];
        parse_str($input['post'], $params);
        $input  = $params;
        unset($input['_image']);
        unset($input['_token']);
        
        $input['url'] = str_slug(trim($input['pengarang']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Pengarang(), [   
            //VALIDATOR
            "pengarang" => "required|unique:mod_pengarang". ($input['id'] ? ",pengarang,".$input['id'] : '')
        ], $input, 'pengarang');

        if ( $image )
        {
            $image = $this->_uploadImage($image, 'pengarang', ['600x600', '140x140'], $input['url']);
            
            if ( isset($image['600x800']) )
            {
                Pengarang::where('id', $status)->update(['image'=>$image['600x800']]);
            }
        }

        $this->clearCache( config('pengarang.info.alias').'/'.$input['url'].'.html' );
                
        return Response()->json([ 
            'status' => $status, 
            'message'=> $this->_buildNotification(true),
            'form'   => $status ? base64_encode($this->form()) : null
        ]);
    }
}