<?php

namespace Modules\___PT___\Models;

use Illuminate\Database\Eloquent\Model;

class ___PT___ extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod____SC___';

    protected $fillable = ['title', 'image', 'url', 'status', 'created_by', 'updated_by'];
}
