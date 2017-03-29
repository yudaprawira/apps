<?php
namespace Modules\Member\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Member\Models\Member,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Member
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            return view('member::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Member::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->nama); })
            ->editColumn('nama', function ($r) { return createLink( url(config('member.info.alias').'/'.$r->url.'.html'), $r->nama ); })
            ->editColumn('status', function ($r) { return $r->status=='1' ? trans('global.active') : trans('global.inactive'); })
            ->editColumn('created_at', function ($r) { return formatDate($r->created_at, 5); })
            ->editColumn('lastlogin', function ($r) { return $r->lastlogin ? formatDate($r->lastlogin, 5) : '-'; })
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
        $data = $id ? Member::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('member::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Member(), $id), 
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
        
        $input['url'] = str_slug(trim($input['nama']).'-'.rand(0, 99));
        $input['status'] = val($input, 'status') ? 1 : 0;

        $image = isset($input['image']) ? $input['image'] : null; unset($input['image']);

        $exclude = ['ulangi_password'];
        $hash = ['password'];

        if ( !$input['password'] ) $exclude[] = 'password';

        $status = $this->_saveData( new Member(), [   
            //VALIDATOR
            "nama" => "required",
            "email" => "required|unique:mod_member". ($input['id'] ? ",id,".$input['id'] : ''),
            "ulangi_password"  => "same:password",
        ], $input, 'nama', $exclude, $hash);

        if ( $status && $image )
        {
            $image = $this->_uploadImage($image, 'member', ['600x800', '200x300'], $input['url']);
            
            if ( isset($image['600x800']) )
            {
                Member::where('id', $status)->update(['image'=>$image['600x800']]);
            }
        }

        $this->clearCache( config('member.info.alias').'/'.$input['url'].'.html' );

        return Redirect( BeUrl( config('member.info.alias') .(!$status ? ($input['id']?'/edit/'.$input['id']:'/add') : '') ) );
    }
}