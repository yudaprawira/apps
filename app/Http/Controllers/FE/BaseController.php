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
            'pub_url'=> url(str_replace('.', '/', config('app.be_template')))
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