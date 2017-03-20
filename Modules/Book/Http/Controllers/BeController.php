<?php
namespace Modules\Book\Http\Controllers;

use Illuminate\Routing\Controller,
    App\Http\Controllers\BE\BaseController,
    Modules\Book\Models\Book,
    Yajra\Datatables\Datatables;

use Input, Session, Request, Redirect;

class BeController extends BaseController
{
    function __construct() {
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | Management Book
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        if ( Request::isMethod('get') )
        {
            return view('book::index', $this->dataView);
        }
        else
        {
            return Datatables::of(Book::query())
            ->addColumn('action', function ($r) { return $this->_buildAction($r->id, $r->title); })
            ->editColumn('title', function ($r) { return createLink( url(config('book.info.alias').'/'.$r->url.'.html'), $r->title ); })
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
        $data = $id ? Book::find($id) : null;
        
        $this->dataView['dataForm'] = $data ? $data->toArray() : []; 
        
        $this->dataView['dataForm']['form_title'] = $data ? trans('global.form_edit') : trans('global.form_add');

        return view('book::form', $this->dataView);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    function delete($id)
    {
        return Response()->json([ 
            'status' => $this->_deleteData(new Book(), $id), 
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

        $image = isset($input['image']) ? $input['image'] : null; unset($input['image']);

        $status = $this->_saveData( new Book(), [   
            //VALIDATOR
            "title" => "required|unique:mod_book". ($input['id'] ? ",title,".$input['id'] : '')
        ], $input, 'title');

        if ( $status && $image )
        {
            $image = $this->_uploadImage($image, 'book', ['600x800', '200x300'], $input['url']);
            
            if ( isset($image['600x800']) )
            {
                Book::where('id', $status)->update(['image'=>$image['600x800']]);
            }
        }

        $this->clearCache( config('book.info.alias').'/'.$input['url'].'.html' );

        return Redirect( BeUrl( config('book.info.alias') .(!$status ? ($input['id']?'/edit/'.$input['id']:'/add') : '') ) );
    }
}