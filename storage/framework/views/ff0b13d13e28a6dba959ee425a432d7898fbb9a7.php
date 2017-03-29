<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data <?php echo e(config('akunbank.info.name')); ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="<?php echo e(BeUrl(config('akunbank.info.alias'))); ?>" data-token="<?php echo e(csrf_token()); ?>">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="image" style="width: 10px"><?php echo e(trans('akunbank::global.image')); ?></th>
                      <th data-sort="1" data-search="1" data-column="nama_bank"><?php echo e(trans('akunbank::global.nama_bank')); ?></th>
                      <th data-sort="1" data-search="1" data-column="nama_akun"><?php echo e(trans('akunbank::global.nama_akun')); ?></th>
                      <th data-sort="1" data-search="1" data-column="rekening"><?php echo e(trans('akunbank::global.rekening')); ?></th>
                      <th data-sort="1" data-search="1" data-column="status" class="col-md-1 nowrap"><?php echo e(trans('global.status')); ?></th>
                      <th data-sort="0" data-search="0" data-column="action" style="width: 90px;white-space: nowrap;"><?php echo e(trans('global.action')); ?></th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-4">
        <?php echo $form; ?>

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
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>