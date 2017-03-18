<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_page';

    protected $fillable = ['title', 'text', 'url', 'status', 'created_by', 'updated_by'];
}
