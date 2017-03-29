<div class="row-fluid">
    <div class="span12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>TANGGAL</th>
                <th>INVOICE</th>
                <th>TOTAL</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                <?php foreach( $trans as $k=>$t ): ?>
                <tr>
                    <td class="text-left nowrap"><?php echo e(formatDate($t->tanggal, 5)); ?></td>
                    <td class="text-center nowrap"><?php echo e($t->invoice); ?></td>
                    <td class="text-right nowrap"><?php echo e(formatNumber($t->total, 0, true)); ?></td>
                    <td class="text-center nowrap"><?php echo e($t->status_pesanan); ?></td>
                    <td class="text-center nowrap">
                    <a href="<?php echo e(url('member/histori-transaksi?page='.val($_GET, 'page').'&inv='.$t->invoice)); ?>">Detail</a>
                    <?php if($t->status_pesanan=='PESANAN'): ?>
                    | <a href="<?php echo e(url('konfirmasi?inv='.$t->invoice)); ?>" target="_blank">Konfirmasi</a>
                    <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center"><?php echo $trans->render(); ?></div>
    </div>
</div>
<?php $__env->startPush('styles'); ?>
<style>
.text-center {
    text-align: center!important;
}
.text-right {
    text-align: right!important;
}
</style>
<?php $__env->stopPush(); ?>