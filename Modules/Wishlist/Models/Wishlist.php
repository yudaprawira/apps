<?php

namespace Modules\Wishlist\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_wishlist';

    protected $fillable = ['item', 'url', 'member_id', 'status', 'created_by', 'updated_by'];

    function book()
    {
        return $this->hasOne('Modules\Book\Models\Book', 'id', 'item');
    }
    function member()
    {
        return $this->hasOne('Modules\Member\Models\Member', 'id', 'member_id');
    }
}
