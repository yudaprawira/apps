<?php

namespace Modules\Pesanan\Models;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_pesanan_detail';

    protected $fillable = ['pesanan_id', 
    'item_id', 'harga', 'qty', 'berat', 'subtotal',
    'created_by', 'updated_by'];
}
