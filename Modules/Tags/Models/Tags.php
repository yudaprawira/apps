<?php

namespace Modules\Tags\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_tags';

    protected $fillable = ['title', 'image', 'url', 'status', 'created_by', 'updated_by'];
}
