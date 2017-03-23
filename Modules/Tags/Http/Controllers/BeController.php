<?php
namespace Modules\Tags\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Tags\Models\Tags,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Tags
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            $this->dataView['form'] = $this->form();
            
            return view('tags::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Tags::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->tags); })
            ->editColumn('tags', function ($r) { return createLink( url(config('tags.info.alias').'/'.$r->url.'.html'), $r->tags ); })
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
        $data = $id ? Tags::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('tags::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Tags(), $id), 
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
        
        $input['url'] = str_slug(trim($input['tags']));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $status = $this->_saveData( new Tags(), [   
            //VALIDATOR
            "tags" => "required|unique:mod_tags". ($input['id'] ? ",tags,".$input['id'] : '')
        ], $input, 'tags');

        if ( $image )
        {
            $image = $this->_uploadImage($image, 'tags', ['600x800', '200x300'], $input['url']);
            
            if ( isset($image['600x800']) )
            {
                Tags::where('id', $status)->update(['image'=>$image['600x800']]);
            }
        }

        $this->clearCache( config('tags.info.alias').'/'.$input['url'].'.html' );
                
        return Response()->json([ 
            'status' => $status, 
            'message'=> $this->_buildNotification(true),
            'form'   => $status ? base64_encode($this->form()) : null
        ]);
    }
}