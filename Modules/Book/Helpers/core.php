<?php
    use Modules\Book\Models\Book;

    function getBook()
    {
        return Book::where('status', '1')->with('relPengarang')->with('relPenerbit')->orderBy('id', 'DESC');
    }

    function getPrice($obj)
    {
        if (val($obj, 'tersedia')==0) return 'Tidak tersedia';

        if ( val($obj, 'harga_sebelum') )
            return '<span class="price-before">'.formatNumber(val($obj, 'harga_sebelum'), 0, true).'</span><span class="price-after"> '.formatNumber(val($obj, 'harga'), 0, true).'</span>';
        else
            return '<span class="price-after">'.formatNumber(val($obj, 'harga'), 0, true).'</span>';
    }

    function getBookUrl($r)
    {
        if ( is_object($r) ) $r = $r->toArray();

        return [
            'detail' => url(config('book.info.alias').'/'.findParentUrl(val($r,'kategori')).'/'.val($r,'url').'.html'),
            'wish' => url('wishlist/'.findParentUrl(val($r,'kategori')).'/'.val($r,'url').'.html'),
            'cart' => url('keranjang/'.findParentUrl(val($r,'kategori')).'/'.val($r,'url').'.html'),
        ];
    }

    function getBookImage($img)
    {
        $info = pathinfo($img);
        $path = $info['dirname'];
        $file = $info['filename'];
        $extn = $info['extension'];
        $ori  = implode('-', array_slice(explode('-', $file), 0, count(explode('-', $file))-1));
        
        return [
            'big' => asset('media/'.$path.'/'.$ori.'-600x800.'.$extn),
            'medium' => asset('media/'.$path.'/'.$ori.'-140x300.'.$extn),
            'small' => asset('media/'.$path.'/'.$ori.'-60x60.'.$extn),
        ];
    }
?>