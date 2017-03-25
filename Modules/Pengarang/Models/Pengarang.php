<?php

namespace Modules\Pengarang\Models;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_pengarang';

    protected $fillable = ['title', 'image', 'url', 'status', 'created_by', 'updated_by'];
}
