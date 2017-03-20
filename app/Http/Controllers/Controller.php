<?php

namespace App\Http\Controllers;

use Session, Image,
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

    /*
    |--------------------------------------------------------------------------
    | UPLOAD IMAGE
    |--------------------------------------------------------------------------
    |@param : $img Object file
    |@param : $mainDir String name parent directories ex:book
    |@param : $size Array ex:['600x800', '200x300']
    |@param : $urlName String ex:abc 
    |@return : abc-600x800.jpg 
    */
    public function _uploadImage($img, $mainDir, $size, $urlName='')
    {
        $ret = array();

        if ( $img && !empty($size) )
        {
            $path = $mainDir."/".date("Y/m/d/");

            //mkdir
            if ( !file_exists( public_path($path) ) ) mkdir( public_path($path), 0777, true );

            foreach ( $size as $s )
            {
                $arrSize = explode('x', $s);

                if ( isset($arrSize[1]) )
                {
                    $urlName = strtolower($urlName ? $urlName : uniqid());

                    $filename  = $urlName.'-'.$s.'.'.$img->getClientOriginalExtension();

                    $realPath = public_path($path . $filename);

                    if ($r = Image::make($img->getRealPath())->resize($arrSize[0], $arrSize[1], function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($realPath))
                    {
                        $ret[$s] = $path.$r->basename;
                    }
                }
            }
        }
        
        return $ret;
    }

    /*
    |--------------------------------------------------------------------------
    | CLEAR CACHE
    |--------------------------------------------------------------------------
    |@param : $cacheKey String Key of Cache
    */
    public function clearCache($cacheKey)
    {
        //clear cache
        if(\Cache::has($cacheKey)) 
        {
            \Cache::forget($cacheKey); 
        }
    }

}
