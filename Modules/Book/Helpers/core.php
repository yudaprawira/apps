<?php
    use Modules\Book\Models\Book;

    function getBook()
    {
        return Book::where('status', '1')->with('relPengarang')->with('relPenerbit')->orderBy('id', 'DESC');
    }

    function getPrice($obj)
    {
        if ($obj->tersedia==0) return 'Tidak tersedia';

        if ( $obj->harga_sebelum )
            return '<span class="price-before">'.formatNumber($obj->harga_sebelum, 0, true).'</span> '.formatNumber($obj->harga, 0, true);
        else
            return formatNumber($obj->harga, 0, true);
    }
?>