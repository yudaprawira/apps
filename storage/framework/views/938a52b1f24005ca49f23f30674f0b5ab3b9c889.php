<div class="row-fluid">
    <div class="span12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th style="width: 64px;">ITEM</th>
                <th>JUDUL</th>
                <th style="width: 30px;">TANGGAL</th>
                <th style="width: 30px;">AKSI</th>
            </thead>
            <tbody>
                <?php if(count($rows)>0): ?>
                    <?php foreach( $rows as $k=>$t ): ?>
                    <tr>
                        <td class="text-center nowrap">
                            <a href="<?php echo e(getBookUrl(val($t, 'book'))['detail']); ?>" target="_blank">
                            <img src="<?php echo e(getBookImage(val($t, 'book.image'))['small']); ?>" />
                            </a>
                        </td>
                        <td class="text-left nowrap">
                            <a href="<?php echo e(getBookUrl(val($t, 'book'))['detail']); ?>" target="_blank">
                            <?php echo e(ucwords(val($t, 'book.title'))); ?>

                            </a>
                        </td>
                        <td class="text-left nowrap"><?php echo e(formatDate($t->tanggal, 5)); ?></td>
                        <td class="text-center nowrap">
                        <a href="<?php echo e(url('wishlist/delete/'.$t->id)); ?>" onclick="return confirm('Apakah yakin akan menghapus item <?php echo e(ucwords(val($t, 'book.title'))); ?>?')">hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="5">Belum ada wishlist</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="text-center"><?php echo $rows->appends(Input::except('page'))->render(); ?></div>
    </div>
</div>
<?php $__env->startPush('styles'); ?>
<style>
.nowrap {
    white-space: nowrap;
}
.text-center {
    text-align: center!important;
}
.text-right {
    text-align: right!important;
}
</style>
<?php $__env->stopPush(); ?>