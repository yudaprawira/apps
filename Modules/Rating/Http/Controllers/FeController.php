<?php

namespace Modules\Rating\Http\Controllers;

use Redirect, Input, Session,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Modules\Rating\Models\Rating,
    Modules\Book\Models\Book,
    Illuminate\Routing\Controller,
    App\Http\Controllers\FE\BaseController;

class FeController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function save()
    {
        $input  = Input::except('_token');

        $ret = [
            'status' => false,
            'is_login' => Session::has('member_id') ? true : false,
            'message' => trans('rating::global.submit.error'),
        ];

        if ( !val($input, 'rating') )
        {
            $ret['message'] = trans('rating::global.submit.require_rating');
        }
        elseif ( !val($input, 'review') )
        {
            $ret['message'] = trans('rating::global.submit.require_review');
        }
        else
        {
            if ( !Session::has('member_id') )
            {
                $ret['message'] = trans('rating::global.submit.require_login');
            }
            else
            {
                $ret['status'] = true;
                $ret['is_login'] = true;

                if (Rating::insertGetId([
                    'member_id' => Session::get('member_id'),
                    'item' => val($input, 'itemid'),
                    'text' => val($input, 'review'),
                    'rating' => val($input, 'rating'),
                ]));
                {
                    //update Item
                    Book::where('id', val($input, 'itemid'))->update(['rating'=>
                        Rating::where('item', val($input, 'itemid'))->where('status', '1')->avg('rating'), 'rating_count' =>
                        Rating::where('item', val($input, 'itemid'))->where('status', '1')->count('rating')
                    ]);
                    $ret['message'] = trans('rating::global.submit.success_rating');

                    //clear cache
                    $this->clearCache( config('book.info.alias').'/'.val($input, 'itemurl').'.html' );
                    $this->clearCache( 'getQuickview-'.val($input, 'itemid') );

                    $ret['last'] = [
                        'image' => Session::get('member_image'),
                        'date' => formatDate(dateSql(), 5),
                        'name'=> ucwords(Session::get('member_nama')),
                        'text' => nl2br(val($input, 'review')),
                        'rating' => roundUp(val($input, 'rating')),
                    ];
                }
            }
        }

        $this->setNotif($ret['message'], ($ret['status'] ? 'success' : 'danger'), 'center');

        $ret['message'] = $this->_buildNotification(true);

        return Response()->json($ret);
    }

    /*
    |--------------------------------------------------------------------------
    | GET DATA more comment
    |--------------------------------------------------------------------------
    */
    public function more()
    {
        $input  = Input::except('_token');
        
        $ret = ['status'=>false, 'is_login'=>false];

        if( val($input, 'item') && val($input, 'start') && val($input, 'offset') )
        {
            if ( Session::has('member_id') )
            {
                $ret['is_login'] = true;
                $ret['status'] = true;
                $ret['next'] = url('rating/more?item='.val($input, 'item').'&start='.((val($input, 'start')+val($input, 'offset'))).'&offset='.val($input, 'offset').'&_token='.csrf_token());
                
                $row = getReview(val($input, 'item'), val($input, 'start'), val($input, 'offset'))->get()->toArray();
                $ret['list'] = [];
                foreach( $row as $k=>$r )
                {   
                    $r['date'] = formatDate( val($r, 'created_at'), 5 );
                    $ret['list'][$k] = $r;
                }
            }
            else
            {
                $ret['message'] = trans('rating::global.submit.require_login');
            }
        }
        else
        {
            $ret['message'] = trans('rating::global.submit.error');
        }

        if ( val($ret, 'message') )
        {
            $this->setNotif($ret['message'], ($ret['status'] ? 'success' : 'danger'), 'center');
            $ret['message'] = $this->_buildNotification(true);
        }
        
        return Response()->json($ret);

    }

}
