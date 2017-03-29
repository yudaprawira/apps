<?php

namespace Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_member';

    protected $fillable = ['nama', 'image', 'email', 'alamat', 'provinsi', 'kota', 'telepon', 'kodepos', 'password', 'hash', 'lastlogin', 'url', 'status', 'created_by', 'updated_by'];
}
