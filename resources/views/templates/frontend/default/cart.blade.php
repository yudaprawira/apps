@extends( config('app.template') . 'layouts.master')

@section('content')
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span12 cart-holder">
                <div class="heading-bar">
                    <h2>KERANJANG BELANJA</h2>
                    <span class="h-line"></span>
                    <a href="{{ url('keranjang/proses') }}" class="more-btn">PROSES CHECKOUT</a>
                </div>
                <div class="cart-table-holder">
                    <table width="100%" border="0" cellpadding="10">
                        <tr>
                            <th width="5%">&nbsp;</th>
                            <th width="43%" align="left">Judul Buku</th>
                            <th width="10%">Harga</th>
                            <th width="10%">Jumlah</th>
                            <th width="12%">Subtotal</th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                        @if( val($cart, 'data') )
                            @foreach( $cart['data'] as $k=>$c )
                            <tr bgcolor="#FFFFFF" class=" product-detail">
                                <td valign="top"><a href="{{ getBookUrl($c)['detail'] }}"><img src="{{ getBookImage(val($c, 'image'))['small'] }}"/></a></td>
                                <td valign="top"><a href="{{ getBookUrl($c)['detail'] }}">{{ ucwords(val($c, 'title')) }}</a></td>
                                <td align="center" valign="top">{!! getPrice($c) !!}</td>
                                <td align="center" valign="top"><input type="number" class="inputQty" data-url="{{ getBookUrl($c)['cart'] }}" type="text" value="{{ val($c, 'qty') }}"/></td>
                                <td align="center" valign="top">{{ formatNumber(val($c, 'subtotal'), 0, true) }}</td>
                                <td align="center" valign="top"><a href="{{ getBookUrl($c)['cart'] }}?del=1"> <i class="icon-trash"></i></a></td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <th colspan="6">Keranjang masih kosong</th>
                        </tr>
                        @endif
                        <tr>
                            <th width="5%">&nbsp;</th>
                            <th width="43%" align="left">&nbsp;</th>
                            <th width="10%">TOTAL</th>
                            <th width="10%">{{ formatNumber( val($cart, 'total.qty') ) }}</th>
                            <th width="12%">{{ formatNumber( val($cart, 'total.harga'), 0, true) }}</th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                    </table>
                </div>

        </section>
        <!-- End Main Content -->
    </section>
  </section>
@stop
@push('styles')
<style>
.inputQty {
    width: 50px;
    padding-right: 0!important;
    text-align: center;
}
.price-before{
    display: block;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    
    $(document).on('change', '.inputQty', function(){
        updateQTY($(this));
    });
    $(document).on('blur', '.inputQty', function(){
        updateQTY($(this));
    });
    $(document).on('keypress', '.inputQty', function(e){
        if(e.keyCode==13)//enter
        {
            updateQTY($(this));
        }
    });

    function updateQTY(e)
    {
        var qty = e.val();
        var url = e.data('url');
        
        window.location.href = url+'?qty='+qty;
    }
});
</script>
@endpush