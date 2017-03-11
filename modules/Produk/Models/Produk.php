<?php

namespace Modules\Produk\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_produk';

    protected $fillable = ['nama_produk', 'url', 'status', 'created_by', 'updated_by'];
}
