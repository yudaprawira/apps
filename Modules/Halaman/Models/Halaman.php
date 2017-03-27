<?php

namespace Modules\Halaman\Models;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_halaman';

    protected $fillable = ['title', 'text', 'url', 'status', 'created_by', 'updated_by'];
}
