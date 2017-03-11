<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data <?php echo e(config('produk.info.name')); ?> </h3>
                  <a href="<?php echo e(BeUrl(config('produk.info.alias').'/add')); ?>" class="btn btn-primary btn-flat btn-add pull-right"><?php echo e(trans('global.add')); ?> <?php echo e(config('produk.info.name')); ?> </a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="<?php echo e(BeUrl(config('produk.info.alias'))); ?>" data-token="<?php echo e(csrf_token()); ?>">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="id" style="width: 10px">ID</th>
                      <th data-sort="1" data-search="1" data-column="nama_produk"><?php echo e(trans('produk::global.nama_produk')); ?></th>
                      <th data-sort="1" data-search="1" data-column="status" class="col-md-1 nowrap"><?php echo e(trans('global.status')); ?></th>
                      <th data-sort="1" data-search="1" data-column="created_at" class="col-md-1 nowrap"><?php echo e(trans('produk::global.created_at')); ?></th>
                      <th data-sort="1" data-search="1" data-column="updated_at" class="col-md-1 nowrap"><?php echo e(trans('produk::global.updated_at')); ?></th>
                      <th data-sort="0" data-search="0" data-column="action" style="width: 90px;white-space: nowrap;"><?php echo e(trans('global.action')); ?></th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
.btn-add{
  margin-right: 5px;
}
#list-table td:nth-child(3),
#list-table td:nth-child(4),
#list-table td:nth-child(5){
  white-space: nowrap;
  text-align: center;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>