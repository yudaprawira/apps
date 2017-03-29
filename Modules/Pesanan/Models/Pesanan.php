<?php

namespace Modules\Pesanan\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_pesanan';

    protected $fillable = ['invoice', 'metode_pembayaran', 'url', 'status_pesanan', 'ongkir', 'nomor_resi', 'status', 'created_by', 'updated_by'];

    function detail()
    {
        return $this->hasMany('Modules\Pesanan\Models\PesananDetail', 'pesanan_id', 'id')->with('item');
    }
}
