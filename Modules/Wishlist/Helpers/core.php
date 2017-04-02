<?php
use Modules\Wishlist\Models\Wishlist;

    function getWishlist()
    {
        return Wishlist::where('status', '1')->where('member_id', \Session::get('member_id'))->with('member')->with('book')->orderBy('id', 'DESC');
    }
?>