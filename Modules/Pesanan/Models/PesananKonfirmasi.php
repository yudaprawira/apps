<?php

namespace Modules\Pesanan\Models;

use Illuminate\Database\Eloquent\Model;

class PesananKonfirmasi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_pesanan_konfirmasi';

    protected $fillable = ['pesanan_id', 
    'akunbank_id', 'bank_dari', 'nama_pemilik', 'total', 'tanggal',
    'created_by', 'updated_by'];

    function bank()
    {
        return $this->hasOne('Modules\AkunBank\Models\AkunBank', 'id', 'akunbank_id');
    }

}
