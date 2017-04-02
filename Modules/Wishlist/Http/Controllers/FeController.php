<?php

namespace Modules\Wishlist\Http\Controllers;

use Redirect, Session,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Illuminate\Routing\Controller,
    Modules\Wishlist\Models\Wishlist,
    App\Http\Controllers\FE\BaseController;

class FeController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Redirect( url('member/wishlist') );
    }

    /*
    |--------------------------------------------------------------------------
    | ADD to Wishlist
    |--------------------------------------------------------------------------
    */
    public function add($category, $url)
    {
        //check ember
        if ( !Session::has('member_id') ) 
        {
            $this->setNotif(trans('wishlist::global.required_login'), 'danger', 'center');

            return Redirect( url('member/login?next='.urlencode( url('wishlist/'.$category.'/'.$url.'.html') )) );
        }

        $this->dataView['row'] = getBook()->where('url', $url)->first();
        
        $this->_validateDetail($category);

        //check
        if ( getWishlist()->where('item', $this->dataView['row']['id'])->count()>0 )
        {
            $this->setNotif(trans('wishlist::global.exists', ['name'=>$this->dataView['row']['title']]), 'danger', 'center');
        }
        else
        {
            if ( Wishlist::insertGetId([
                'item' => $this->dataView['row']['id'],
                'member_id' => Session::get('member_id')
            ]) )
            {
                $this->setNotif(trans('wishlist::global.success', ['name'=>$this->dataView['row']['title']]), 'success', 'center');
            }
            else
            {
                $this->setNotif(trans('wishlist::global.failed', ['name'=>$this->dataView['row']['title']]), 'danger', 'center');
            }
        }

        return Redirect( url('member/wishlist') );
    }

    /*
    |--------------------------------------------------------------------------
    | deelete to Wishlist
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        if ( $row = getWishlist()->where('id', $id)->first() )
        {
            if ( Wishlist::where('id', $id)->update(['status'=>'0']) )
                $this->setNotif(trans('wishlist::global.sucdel', ['name'=>val($row, 'book.title')]), 'success', 'center');
            else
                $this->setNotif(trans('wishlist::global.flddel', ['name'=>val($row, 'book.title')]), 'danger', 'center');

        }
        else
        {
            $this->setNotif(trans('wishlist::global.notfound'), 'danger', 'center');
        }

        return Redirect( url('member/wishlist') );
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATE DETAIL
    |--------------------------------------------------------------------------
    */
    private function _validateDetail($category)
    {
        //check row
        if ( !$this->dataView['row'] )
        {
            return abort(404);
        }
        
        $parentUrl = findParentUrl(val($this->dataView['row'], 'kategori'));
        //redirect
        if ( $parentUrl!=$category )
        {
            return Redirect( getBookUrl($this->dataView['row'])['detail']);
        }

        $this->dataView['row'] = $this->dataView['row']->toArray();
        $this->dataView['reviews'] = getReview(val($this->dataView['row'], 'id'))->get();
                                    
        //RELATED
        $item = 3;
        $this->dataView['related'] = getBook()->where('id', '<>', $this->dataView['row']['id'])->where('kategori', $this->dataView['row']['kategori'])->limit($item)->get()->toArray();
        if ( count($this->dataView['related'])<3 )
        {
            $ids = getRowArray($this->dataView['related'], 'id', 'id');
            $ids[$this->dataView['row']['id']] = $this->dataView['row']['id'];
            $this->dataView['related'] = getRowArray(array_merge($this->dataView['related'], getBook()->whereNotIn('id', $ids)->where('kategori', getCategoryIncluded($this->dataView['row']['kategori']))->limit(($item-count($this->dataView['related'])))->get()->toArray()), 'id', '*');
        }
        if ( count($this->dataView['related'])<3 )
        {
            $ids = getRowArray($this->dataView['related'], 'id', 'id');
            $ids[$this->dataView['row']['id']] = $this->dataView['row']['id'];
            $this->dataView['related'] = getRowArray(array_merge($this->dataView['related'], getBook()->whereNotIn('id', $ids)->limit(($item-count($this->dataView['related'])))->get()->toArray()), 'id', '*');
        }

        //set Meta
        $this->dataView['title'] = ucwords(strtolower($this->dataView['row']['title'])).' | '.config('app.title');
    }

}
