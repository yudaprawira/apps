<?php

namespace Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_book';

    protected $fillable = ['title', 'url', 'status', 'created_by', 'updated_by'];
}
