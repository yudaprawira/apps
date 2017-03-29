<?php

namespace Modules\AkunBank\Models;

use Illuminate\Database\Eloquent\Model;

class AkunBank extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_akunbank';

    protected $fillable = ['nama_bank', 'image', 'nama_akun', 'rekening', 'url', 'status', 'created_by', 'updated_by'];
}
