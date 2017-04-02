<?php

namespace Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_book';

    protected $fillable = ['title', 'url', 'status', 'headline', 'rating', 'tersedia', 'rekomendasi', 'terjual', 'deskripsi', 'kategori', 'pengarang', 'penerbit', 'isbn', 'rilis', 'bahasa', 'berat', 'halaman', 'harga', 'harga_sebelum', 'created_by', 'updated_by'];

    function relPengarang()
    {
        return $this->hasOne('\Modules\Pengarang\Models\Pengarang', 'id', 'pengarang');
    }
    function relPenerbit()
    {
        return $this->hasOne('\Modules\Penerbit\Models\Penerbit', 'id', 'penerbit');
    }
}
