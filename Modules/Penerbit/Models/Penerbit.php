<?php

namespace Modules\Penerbit\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_penerbit';

    protected $fillable = ['penerbit', 'url', 'status', 'created_by', 'updated_by'];
}
