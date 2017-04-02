<?php

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_rating';

    protected $fillable = ['item', 'member_id', 'rating', 'text', 'status', 'created_by', 'updated_by'];

    function book()
    {
        return $this->hasOne('Modules\Book\Models\Book', 'id', 'item');
    }
    function member()
    {
        return $this->hasOne('Modules\Member\Models\Member', 'id', 'member_id');
    }
}
