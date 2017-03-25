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
        $this->dataView['headline'] = getBook()->where('headline', '1')->get();

        $this->dataView['terjual'] = getBook()->where('terjual', '1')->limit(3)->get();
        
        return view($this->tmpl . 'homepage', $this->dataView);
    }
}