<?php

namespace Modules\Blogspot\Models;

use Illuminate\Database\Eloquent\Model;

class Blogspot extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_blogspot';

    protected $fillable = ['judule_blog', 'url', 'status', 'created_by', 'updated_by'];
}
