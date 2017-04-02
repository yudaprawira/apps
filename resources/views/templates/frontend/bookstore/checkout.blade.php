@extends( config('app.template') . 'layouts.master')

@section('content')
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="{{ getBookImage(val(array_values($cart['data'])[rand(0, count($cart['data'])-1)], 'image'))['big'] }}">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2>CHECKOUT</h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{url('/')}}">BERANDA</a></li>
                <li><a href="{{url('keranjang')}}">KERANJANG</a></li>
                <li><a href="{{url('keranjang/proses')}}">CHECKOUT</a></li>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">
    <section id="content-holder" class="container-fluid container">
    <form action="{{ url('keranjang/save') }}" id="frm-checkout" method="POST" class="sending-form">

    <div class="col-md-7">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="tabCollapseMethod">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMethod" aria-expanded="false" aria-controls="collapseMethod">
                    AKUN
                    </a>
                </h4>
                </div>
                <div id="collapseMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tabCollapseMethod">
                    <div class="panel-body">
                        Checkout sebagai member, bukan {{ session::get('member_nama') }}? <a href="{{ url('member/logout?next='.urlencode( url('keranjang/proses'))) }}">ganti akun</a>
                    </div>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="tabCollapseBilShip">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseBilShip" aria-expanded="true" aria-controls="collapseBilShip">
                    PEMBELI DAN PENERIMA
                    </a>
                </h4>
                </div>
                <div id="collapseBilShip" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="tabCollapseBilShip">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div style="color: #666;">
                                    <input type="checkbox" id="cart-checkship" style="float: left;width: 15px!important;margin-top: -15px;margin-right: 5px;"/> Kirim ke alamat yang sama
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: 0;"/>
                        <div class="row data-pembeli">
                            <div class="col-md-6" style="border-right: 1px solid #eee;">
                                <strong class="green-t">Data Pembeli</strong>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nama <sup>*</sup> <span class="char_count"></span> </label>
                                    <input class="form-control" required="required" name="nama_pembeli" placeholder="Nama Pembeli" maxlength=50 value="{{ Session::get('member_nama') }}" required>
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Email <sup>*</sup> <span class="char_count"></span> </label>
                                    <input class="form-control" required="required" name="email_pembeli" placeholder="Email Pembeli" maxlength=50 value="{{ Session::get('member_email') }}" required>
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Alamat <sup>*</sup> <span class="char_count"></span> </label>
                                    <textarea class="form-control" name="alamat_pembeli" required maxlength="255" >{{ Session::get('member_alamat') }}</textarea>
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Provinsi <sup>*</sup> <span class="char_count"></span> </label>
                                            <input class="form-control" style="padding-left: 5px;padding-right: 5px;" type="text" name="provinsi_pembeli" maxlength="30" placeholder="" class=" " value="{{ Session::get('member_provinsi') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Kota <sup>*</sup> <span class="char_count"></span> </label>
                                            <input class="form-control" style="padding-left: 5px;padding-right: 5px;" type="text" name="kota_pembeli" placeholder="" maxlength="35" class=" " value="{{ Session::get('member_kota') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Telepon <sup>*</sup> <span class="char_count"></span> </label>
                                    <input class="form-control" type="text" name="telepon_pembeli" placeholder="" maxlength="20" class=" " value="{{ Session::get('member_telepon') }}" required>
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Kode pos  <span class="char_count"></span> </label>
                                    <input class="form-control" type="text" name="kodepos_pembeli" placeholder="" maxlength="5" class=" " value="{{ Session::get('member_kodepos') }}" >
                                    <i class="fa fa-map-pin"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <strong class="green-t">Data Penerima</strong>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nama <sup>*</sup> <span class="char_count"></span> </label>
                                    <input class="form-control" required="required" name="nama_penerima" placeholder="Nama Penerima" maxlength=50 value="" required>
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Email <sup>*</sup> <span class="char_count"></span> </label>
                                    <input class="form-control" required="required" name="email_penerima" placeholder="Email" maxlength=50 value="" required>
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Alamat <sup>*</sup> <span class="char_count"></span> </label>
                                    <textarea class="form-control" name="alamat_penerima" required maxlength="255" ></textarea>
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Provinsi <sup>*</sup> <span class="char_count"></span> </label>
                                            <input class="form-control" style="padding-left: 5px;padding-right: 5px;" type="text" name="provinsi_penerima" maxlength="30" placeholder="" class=" " value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <label class="control-label">Kota <sup>*</sup> <span class="char_count"></span> </label>
                                            <input class="form-control" style="padding-left: 5px;padding-right: 5px;" type="text" name="kota_penerima" placeholder="" maxlength="35" class=" " value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Telepon <sup>*</sup> <span class="char_count"></span> </label>
                                    <input class="form-control" type="text" name="telepon_penerima" placeholder="" maxlength="20" class=" " value="" required>
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Kode pos  <span class="char_count"></span> </label>
                                    <input class="form-control" type="text" name="kodepos_penerima" placeholder="" maxlength="5" class=" " value="" >
                                    <i class="fa fa-map-pin"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="tabCollapsePaymentMethod">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsePaymentMethod" aria-expanded="false" aria-controls="collapsePaymentMethod">
                    METODE PEMBAYARAN
                    </a>
                </h4>
                </div>
                <div id="collapsePaymentMethod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="tabCollapsePaymentMethod">
                    <div class="panel-body">
                        <input type="radio" name="metode_pembayaran" value="transfer" checked="checked" required style="float: left;width: 15px;margin-top: -14px;margin-right: 5px;"> Transfer Bank
                        <br/><br/>
                        <div class="row">
                        @foreach(getBank() as $b)
                            <div class="col-md-4">
                                <img src="{{ asset( 'media/' . val($b, 'image') ) }}" alt="{{ val($b, 'nama_bank') }}" style="widht: 80px;"/><br/>
                                {{ val($b, 'nama_bank') }}</br/>
                                A.N : {{ val($b, 'nama_akun') }}</br/>
                                Rek : {{ val($b, 'rekening') }}
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">PESANAN</div>
            <table width="100%" border="0" cellpadding="14" class="table table-bordered table-hover">
                <tbody>
                    <tr class="heading-bar-table">
                        <th width="47%" align="left">Judul Buku</th>
                        <th width="18%">Harga</th>
                        <th width="1%">Jml</th>
                        <th width="16%">Subtotal </th>
                    </tr>
                    @if( val($cart, 'data') )
                        @foreach( $cart['data'] as $k=>$c )
                        <tr>
                            <td width="47%" align="left"><a href="{{ getBookUrl($c)['detail'] }}">{{ ucwords(val($c, 'title')) }}</a></td>
                            <td width="18%" style="white-space: nowrap;">{!! getPrice($c) !!}</td>
                            <td width="1%">{{ val($c, 'qty') }}</td>
                            <td width="16%" class="text-right" style="white-space: nowrap;">{{ formatNumber(val($c, 'subtotal'), 0, true) }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <th colspan="3" align="right" class="text-right">TOTAL</th>
                    <th width="16%" class="text-right">{{ formatNumber( val($cart, 'total.harga'), 0, true) }}</th>
                </tfoot>
            </table>
            <div class="panel-footer text-right">
                <a href="{{ url('keranjang') }}" class="pull-left" style="margin-top: 15px;">Edit Keranjang</a>
                <button type="submit" class="more-btn btn-1 sm shadow-0">Pesan Sekarang</button>
            </div>
        </div>
    </div>
            
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    </form>
    </section>
</main>
@stop
@push('styles')
<style>
#frm-checkout a {
    display: inline-block;
}
#frm-checkout textarea {
    line-height: 25px;
}
#frm-checkout .form-group i {
    top: 35px;
}
.price-before{
    display: block;
}
.green-t {
    margin: 0px 0 10px;
    display: block;
    color: #bbb;
    text-align: center;
    text-transform: uppercase;
}
</style>
@endpush
@push('scripts')
<script>
$(document).ready(function(){
    $(document).on('input', '#collapseBilShip input, #collapseBilShip textarea', function(){
        var isChecked = $('#cart-checkship').is(':checked');
        var elementID = $(this).attr('name').replace('_pembeli', '_penerima');
        if ( isChecked )
        {
            $('[name='+elementID+']').val($(this).val());
            $('[name='+elementID+']').removeClass('inputHighlight');
        }
    });
    $(document).on('change', '#cart-checkship', function(){

        var isChecked = $(this).is(':checked');

        $('#collapseBilShip .data-pembeli input, #collapseBilShip .data-pembeli textarea').each(function(){
            var elementID = $(this).attr('name').replace('_pembeli', '_penerima');
            if ( isChecked )
            {
                $('[name='+elementID+']').val($(this).val());
                $('[name='+elementID+']').removeClass('inputHighlight');
            }
            else
            {
                $('[name='+elementID+']').val('');
            }
        });
    });
    $(document).on('submit', '#frm-checkout', function(){
        
        var frm = $(this);

        $('#collapseBilShip').addClass('in');
        $('#collapseBilShip').css('height', 'auto');

        $.ajax({
            type		: 'POST',
            url			: frm.attr('action'),
            data		: frm.serialize(),
            beforeSend	: function(xhr) { loading(1); },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status )
                {
                if ( dt.redirect ) window.location.href = dt.redirect;
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });
});
</script>
@endpush