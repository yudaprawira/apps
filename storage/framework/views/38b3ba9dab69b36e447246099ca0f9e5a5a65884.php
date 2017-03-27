<?php $__env->startSection('content'); ?>
<section id="content-holder" class="container-fluid container">
  <form action="<?php echo e(url('keranjang/save')); ?>" id="frm-checkout" method="POST">
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
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseMethod"> Metode </a>
                                </div>
                                <div id="collapseMethod" class="accordion-body in collapse" style="height:auto;">
                                    <div class="accordion-inner">
                                        isi content
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
                                                        <input class="span12" type="text" name="nama_pembeli" maxlength="50" placeholder="" class=" " require>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Email <sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="email_pembeli"maxlength="75"  placeholder="" class=" " require>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Alamat <sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <textarea class="span12" name="alamat_pembeli" require maxlength="255" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Provinsi <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="provinsi_pembeli" maxlength="30" placeholder="" class=" " require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kota <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kota_pembeli" placeholder="" maxlength="35" class=" " require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span8">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Telepon <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="telepon_pembeli" placeholder="" maxlength="20" class=" " require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kode Pos <span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kodepos_pembeli" placeholder="" maxlength="5" class=" ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <strong class="green-t"><input type="checkbox" id="cart-checkship" checked style="margin-right: 2px;margin-top: -2px"/>Data Penerima sama dengan Data Pembeli</strong>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Nama Penerima<sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="nama_penerima" placeholder="" class=" "  maxlength="50" require>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Email<span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <input class="span12" type="text" name="email_penerima" placeholder="" class=" " maxlength="75">
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="control-label">Alamat yang dituju<sup>*</sup><span class="char_count"></span></label>
                                                    <div class="controls has-feedback">
                                                        <textarea class="span12" name="alamat_penerima" require maxlength="255"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Provinsi <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="provinsi_penerima" maxlength="30" placeholder="" class=" " require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kota <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kota_penerima" placeholder="" maxlength="35" class=" " require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-fluid">
                                                    <div class="span8">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Telepon <sup>*</sup><span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="telepon_penerima" placeholder="" maxlength="20" class=" " require>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span4">
                                                        <div class="control-group form-group">
                                                            <label class="control-label">Kode Pos <span class="char_count"></span></label>
                                                            <div class="controls has-feedback">
                                                                <input class="span12" type="text" name="kodepos_penerima" placeholder="" maxlength="5" class=" ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <?php if( val($cart, 'data') ): ?>
                                        <?php foreach( $cart['data'] as $k=>$c ): ?>
                                        <tr>
                                            <td width="47%" align="left"><a href="<?php echo e(getBookUrl($c)['detail']); ?>"><?php echo e(ucwords(val($c, 'title'))); ?></a></td>
                                            <td width="18%" style="white-space: nowrap;"><?php echo getPrice($c); ?></td>
                                            <td width="1%"><?php echo e(val($c, 'qty')); ?></td>
                                            <td width="16%" style="white-space: nowrap;"><?php echo e(formatNumber(val($c, 'subtotal'), 0, true)); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="3" align="left"><a href="<?php echo e(url('keranjang')); ?>">Edit Keranjang</a></td>
                                        <td><button type="submit" class="more-btn">Pesan Sekarang</button> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
      </form>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
.checkout-holder {
    border-bottom: none;
    border-left: 1px solid #ddd;
    border-right: none;
}
.price-before{
    display: block;
}
textarea {
    resize: vertical;
    min-height: 80px!important;
}
.inputHighlight {
    border: 1px solid red!important;
    background: #ffd9d9!important;
}
.char_count{
    float: right;
    font-size: 11px;
    margin-top: 5px;
    color: #c5c5c5;
}
sup, .red {
    color: red;
}
.black {
    color: #c5c5c5;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>