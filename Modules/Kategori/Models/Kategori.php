<?php

namespace Modules\Kategori\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_kategori';

    protected $fillable = ['name', 'url', 'status', 'created_by', 'updated_by'];
}
