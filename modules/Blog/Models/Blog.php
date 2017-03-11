<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_blog';

    protected $fillable = ['judul', 'url', 'status', 'created_by', 'updated_by'];
}
