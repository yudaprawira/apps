<?php
use Modules\Rating\Models\Rating;

function getReview($itemID, $start=0, $end=3)
{
    return Rating::where('status', '1')
            ->orderBy('id', 'DESC')->offset($start)->limit($end)
            ->with('member')
            ->where('item', $itemID);
}
?>