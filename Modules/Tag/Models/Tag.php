<?php

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_tag';

    protected $fillable = ['tag', 'url', 'status', 'created_by', 'updated_by'];
}
