@extends( config('app.template') . 'layouts.master')

@section('content')
<section id="content-holder" class="container-fluid container">
  <form action="{{ url('keranjang/save') }}" id="frm-checkout" method="POST">
        <section class="row-fluid">
            <div class="heading-bar">
                <h2>Checkout</h2>
                <span class="h-line"></span> 
            </div>
            
            <div class="span7 first">
                <section class="checkout-holder">
                    <section class="span12 first">
                
                        <div class="accordion" id="accordion2">
                            
                            <div class="accordion-group">
                                <div class="accordion-heading"> 
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseMethod"> Akun </a>
                                </div>
                                <div id="collapseMethod" class="accordion-body in collapse" style="height:auto;">
                                    <div class="accordion-inner">
                                        Checkout sebagai member, bukan {{ session::get('member_nama') }}? <a href="{{ url('member/logout?next='.urlencode( url('keranjang/proses'))) }}">ganti akun</a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-group">
                                <div class="accordion-heading"> 
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseBilShip"> Pembeli & Penerima </a>
                                </div>
                                <div id="collapseBilShip" class="accordion-body collapse" style="height: 0px;">
                                    <div class="accordion-inner">
                                        
                                            <div class="span6 check-method-left data-pembeli">
                                                <strong class="green-t">Data Pembeli</strong>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Nama <sup>*</sup> <span class="char_count"></span> </label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="nama_pembeli" maxlength="50" value="{{ Session::get('member_nama') }}" placeholder="" class=" " required>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Email <sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="email_pembeli"maxlength="75" value="{{ Session::get('member_email') }}" placeholder="" class=" " required>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Alamat <sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <textarea class="span12" name="alamat_pembeli" required maxlength="255" >{{ Session::get('member_alamat') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Provinsi <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="provinsi_pembeli" maxlength="30" placeholder="" class=" " value="{{ Session::get('member_provinsi') }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kota <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kota_pembeli" placeholder="" maxlength="35" class=" " value="{{ Session::get('member_kota') }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span8">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Telepon <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="telepon_pembeli" placeholder="" maxlength="20" class=" " value="{{ Session::get('member_telepon') }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kode Pos <span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kodepos_pembeli" placeholder="" maxlength="5" class=" " value="{{ Session::get('member_kodepos') }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <strong class="green-t"><input type="checkbox" id="cart-checkship" style="margin-right: 2px;margin-top: -2px"/>Data Penerima sama dengan Data Pembeli</strong>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Nama Penerima<sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="nama_penerima" placeholder="" class=" "  maxlength="50" value=""  required>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Email<span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="email_penerima" placeholder="" class=" " maxlength="75" value="" >
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Alamat yang dituju<sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <textarea class="span12" name="alamat_penerima" required maxlength="255"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Provinsi <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="provinsi_penerima" maxlength="30" placeholder="" class=" " value=""  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kota <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kota_penerima" placeholder="" maxlength="35" class=" " value=""  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span8">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Telepon <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="telepon_penerima" placeholder="" maxlength="20" class=" " value="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kode Pos <span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kodepos_penerima" placeholder="" maxlength="5" class=" " value="" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-group">
                                <div class="accordion-heading"> 
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapsePaymentMethod"> Metode Pembayaran</a>
                                </div>
                                <div id="collapsePaymentMethod" class="accordion-body collapse" style="height:0;">
                                    <div class="accordion-inner">
                                        <input type="radio" name="metode_pembayaran" value="transfer" checked> Transfer Bank
                                        <br/><br/>
                                        <div class="row-fluid">
                                        @foreach(getBank() as $b)
                                            <div class="span4">
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
                    </section>
                </section>
            </div>
            <div class="span5">
                <div class="accordion-group">
                    <div class="accordion-heading"> 
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseReview"> Rincian Pesanan </a> 
                    </div>
                    <div id="collapseReview" class="accordion-body collapse in" style="height: auto;">
                        <div class="accordion-inner no-p">
                            <table width="100%" border="0" cellpadding="14">
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
                                            <td width="16%" style="white-space: nowrap;">{{ formatNumber(val($c, 'subtotal'), 0, true) }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="3" align="left"><a href="{{ url('keranjang') }}">Edit Keranjang</a></td>
                                        <td><button type="submit" class="more-btn">Pesan Sekarang</button> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      </form>
</section>
@stop
@push('styles')
<style>
.checkout-holder {
    border-bottom: none;
    border-left: 1px solid #ddd;
    border-right: none;
}
.price-before{
    display: block;
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

                if ( dt.redirect ) window.location.href = dt.redirect;
            },
        }).done(function(){ loading(0); });
        
        return false;
    });
});
</script>
@endpush