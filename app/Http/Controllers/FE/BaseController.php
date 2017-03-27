<?php
namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller,
    App\Http\Requests;

use Lang, Route, Session, Request, Cookie, Redirect, Hash;

class BaseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Parent Construct
    |-------------------------------------------------------------------------
    | build main page 
    | box global, header, menu, footer
    */
    function __construct() 
    {
        parent::__construct();

        /**
         * Template 
        **/
        $this->tmpl = config('app.template');
        
        /**
         * Current Path
        **/
        $this->currentPath = $this->_getCurrentPage();

        /**
         * Template Public URL 
        **/
        $this->dataView = [
            'title'  => trans('global.dashboard'),
            'notif'  => $this->_buildNotification(),
            'pub_url'=> url(str_replace('.', '/', config('app.template'))),
            'categories'  => categoryArray(),
            'footer_data' => $this->_footerData(),
        ];
        
    }
    
    /*
    |--------------------------------------------------------------------------
    | FOOTER DATA
    |--------------------------------------------------------------------------
    */
    private function _footerData()
    {
        return [
            'best_seller' => getBook()->limit(6)->get()->toArray(),
            'top_rated'   => getBook()->limit(6)->get()->toArray()
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | GET CURRENT PAGE
    |--------------------------------------------------------------------------
    */
    private function _getCurrentPage()
    {
        $fullPath = Route::getCurrentRoute()->getPath();
        $backPath = '/';
        $curnPath = $fullPath;

        if ( substr($fullPath, 0, strlen($backPath)) == $backPath  )
            $curnPath = explode('/', $fullPath)[1];
        
        return $curnPath;
    }
}