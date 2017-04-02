<?php

namespace Modules\Pengaturan\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_pengaturan';

    protected $fillable = ['title', 'image', 'url', 'status', 'created_by', 'updated_by'];
}
