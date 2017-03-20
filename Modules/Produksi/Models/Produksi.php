<?php

namespace Modules\Produksi\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_produksi';

    protected $fillable = ['produksi', 'image', 'url', 'status', 'created_by', 'updated_by'];
}
