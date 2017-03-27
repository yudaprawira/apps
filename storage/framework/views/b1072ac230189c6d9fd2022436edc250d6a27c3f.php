<?php $__env->startSection('content'); ?>
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span12 cart-holder">
                <div class="heading-bar">
                    <h2>KERANJANG BELANJA</h2>
                    <span class="h-line"></span>
                    <a href="<?php echo e(url('keranjang/proses')); ?>" class="more-btn">PROSES CHECKOUT</a>
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
                        <?php if( val($cart, 'data') ): ?>
                            <?php foreach( $cart['data'] as $k=>$c ): ?>
                            <tr bgcolor="#FFFFFF" class=" product-detail">
                                <td valign="top"><a href="<?php echo e(getBookUrl($c)['detail']); ?>"><img src="<?php echo e(getBookImage(val($c, 'image'))['small']); ?>"/></a></td>
                                <td valign="top"><a href="<?php echo e(getBookUrl($c)['detail']); ?>"><?php echo e(ucwords(val($c, 'title'))); ?></a></td>
                                <td align="center" valign="top"><?php echo getPrice($c); ?></td>
                                <td align="center" valign="top"><input type="number" class="inputQty" data-url="<?php echo e(getBookUrl($c)['cart']); ?>" type="text" value="<?php echo e(val($c, 'qty')); ?>"/></td>
                                <td align="center" valign="top"><?php echo e(formatNumber(val($c, 'subtotal'), 0, true)); ?></td>
                                <td align="center" valign="top"><a href="<?php echo e(getBookUrl($c)['cart']); ?>?del=1"> <i class="icon-trash"></i></a></td>
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
                            <th width="10%">TOTAL</th>
                            <th width="10%"><?php echo e(formatNumber( val($cart, 'total.qty') )); ?></th>
                            <th width="12%"><?php echo e(formatNumber( val($cart, 'total.harga'), 0, true)); ?></th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                    </table>
                </div>

        </section>
        <!-- End Main Content -->
    </section>
  </section>
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