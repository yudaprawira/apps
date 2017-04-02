@extends( config('app.template') . 'layouts.master')

@section('content')
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="{{ getBookImage(val(array_values($cart['data'])[rand(0, count($cart['data'])-1)], 'image'))['big'] }}">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2>KERANJANG BELANJA</h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{url('/')}}">BERANDA</a></li>
                <li><a href="{{url('keranjang')}}">KERANJANG</a></li>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">

    <section id="content-holder" class="container-fluid container">
        <section class="row">
            <section class="col-md-12 cart-holder">
                <div class="heading-bar">
                    <div class="text-right">
                        <a href="{{ url('keranjang/proses') }}" class="btn-1 sm shadow-0">PROSES CHECKOUT</a>
                    </div>
                    <br/>
                </div>
                <div class="cart-table-holder">
                    <table width="100%" class="table table-bordered table-striped" border="0" cellpadding="10">
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
                            <tr bgcolor="#FFFFFF">
                                <td valign="top"><a href="{{ getBookUrl($c)['detail'] }}"><img src="{{ getBookImage(val($c, 'image'))['small'] }}"/></a></td>
                                <td valign="top"><a href="{{ getBookUrl($c)['detail'] }}">{{ ucwords(val($c, 'title')) }}</a></td>
                                <td class="text-right" valign="top">{!! getPrice($c) !!}</td>
                                <td class="text-center" valign="top"><input type="number" class="inputQty" min=1 data-url="{{ getBookUrl($c)['cart'] }}" class="tNum" value="{{ val($c, 'qty') }}"/></td>
                                <td class="text-right" valign="top">{{ formatNumber(val($c, 'subtotal'), 0, true) }}</td>
                                <td class="text-center" valign="top"><a href="{{ getBookUrl($c)['cart'] }}?del=1">&times;</a></td>
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
                            <th width="10%" class="text-right">TOTAL</th>
                            <th width="10%" class="text-center">{{ formatNumber( val($cart, 'total.qty') ) }}</th>
                            <th width="12%" class="text-right">{{ formatNumber( val($cart, 'total.harga'), 0, true) }}</th>
                            <th width="5%" class="text-center">&nbsp;</th>
                        </tr>
                    </table>
                </div>

        </section>
        <!-- End Main Content -->
    </section>
  
</main>
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