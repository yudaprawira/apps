<?php

namespace App\Http\Controllers;

use Session,
    Illuminate\Foundation\Bus\DispatchesJobs,
    Illuminate\Routing\Controller as BaseController,
    Illuminate\Foundation\Validation\ValidatesRequests,
    Illuminate\Foundation\Auth\Access\AuthorizesRequests,
    Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Global varible to build Main Page 
    **/
    public $dataView;
    
    /**
     * Variable template 
    **/
    public $tmpl;
    
    /**
     * Variable Current path 
    **/
    public $currentPath;

    /**
     * Variable Breadcrumbs
    **/
    public $rowBreadcrumbs;

    function __construct() 
    {

    }

    /*
    |--------------------------------------------------------------------------
    | Notif
    |--------------------------------------------------------------------------
    | @param $text String, berisi teks yang akan ditampilkan sebagai notif
    | @param $type String, [success|warning|danger|info]
    | @param $align String, [left|center|right]
    | @param $width String, [auto|150px]
    | @param $close boolean, [true|false]
    | @param $name String, nama elemen dari tag HTML
    */
    public function setNotif($text, $type='warning', $align='center', $width='auto', $close='false', $name='')
    {
        Session::push('ses_notif', [
            'text' => $text,
            'type' => $type,
            'align'=> $align,
            'width'=> $width,
            'close'=> $close,
            'name' => $name,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Notification
    |--------------------------------------------------------------------------
    */
    public function _buildNotification($encrypt=false)
    {
        $notif = Session::get('ses_notif');
        
        Session::forget('ses_notif');
        
        $mesage = view('global.notif', ['notif'=>$notif]);
        
        return $encrypt ? base64_encode($mesage) : $mesage;
    }
}
