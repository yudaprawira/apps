<?php
namespace App\Http\Controllers\FE;

use App\Http\Requests;

use Lang, Route, Session, Request, Cookie, Redirect, Hash;

class HomeController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Parent Construct
    |-------------------------------------------------------------------------
    */
    function __construct() 
    {
        parent::__construct();
    }
    /*
    |--------------------------------------------------------------------------
    | Parent Construct
    |-------------------------------------------------------------------------
    */
    function index() 
    {
        $this->dataView['headline'] = getBook()->where('headline', '1')->get()->toArray();

        $this->dataView['terjual'] = getBook()->where('terjual', '1')->limit(3)->get()->toArray();

        foreach( categoryArray()['parent_id'][0] as $c )
        {
            $this->dataView['products'][$c] = getBook()->whereIn('kategori', getCategoryIncluded($c))->limit(4)->get()->toArray();
        }
        
        return view($this->tmpl . 'homepage', $this->dataView);
    }
}