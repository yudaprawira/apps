<?php

namespace Modules\Pesanan\Models;

use Illuminate\Database\Eloquent\Model;

class PesananPembeli extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_pesanan_pembeli';

    protected $fillable = ['pesanan_id',
    'nama_pembeli', 'email_pembeli', 'alamat_pembeli', 'provinsi_pembeli', 'kota_pembeli', 'telepon_pembeli', 'kodepos_pembeli', 
    'nama_penerima', 'email_penerima', 'alamat_penerima', 'provinsi_penerima', 'kota_penerima', 'telepon_penerima', 'kodepos_penerima',
    'created_by', 'updated_by'];
}
