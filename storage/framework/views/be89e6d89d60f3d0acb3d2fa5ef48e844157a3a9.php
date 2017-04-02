<?php $__env->startSection('content'); ?>
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="<?php echo e(getBookImage(val(array_values($cart['data'])[rand(0, count($cart['data'])-1)], 'image'))['big']); ?>">
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
                <li><a href="<?php echo e(url('/')); ?>">BERANDA</a></li>
                <li><a href="<?php echo e(url('keranjang')); ?>">KERANJANG</a></li>
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
                        <a href="<?php echo e(url('keranjang/proses')); ?>" class="btn-1 sm shadow-0">PROSES CHECKOUT</a>
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
                        <?php if( val($cart, 'data') ): ?>
                            <?php foreach( $cart['data'] as $k=>$c ): ?>
                            <tr bgcolor="#FFFFFF">
                                <td valign="top"><a href="<?php echo e(getBookUrl($c)['detail']); ?>"><img src="<?php echo e(getBookImage(val($c, 'image'))['small']); ?>"/></a></td>
                                <td valign="top"><a href="<?php echo e(getBookUrl($c)['detail']); ?>"><?php echo e(ucwords(val($c, 'title'))); ?></a></td>
                                <td class="text-right" valign="top"><?php echo getPrice($c); ?></td>
                                <td class="text-center" valign="top"><input type="number" class="inputQty" min=1 data-url="<?php echo e(getBookUrl($c)['cart']); ?>" class="tNum" value="<?php echo e(val($c, 'qty')); ?>"/></td>
                                <td class="text-right" valign="top"><?php echo e(formatNumber(val($c, 'subtotal'), 0, true)); ?></td>
                                <td class="text-center" valign="top"><a href="<?php echo e(getBookUrl($c)['cart']); ?>?del=1">&times;</a></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <th colspan="6">Keranjang masih kosong</th>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th width="5%">&nbsp;</th>
                            <th width="43%" align="left">&nbsp;</th>
                            <th width="10%" class="text-right">TOTAL</th>
                            <th width="10%" class="text-center"><?php echo e(formatNumber( val($cart, 'total.qty') )); ?></th>
                            <th width="12%" class="text-right"><?php echo e(formatNumber( val($cart, 'total.harga'), 0, true)); ?></th>
                            <th width="5%" class="text-center">&nbsp;</th>
                        </tr>
                    </table>
                </div>

        </section>
        <!-- End Main Content -->
    </section>
  
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>