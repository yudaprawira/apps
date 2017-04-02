<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data <?php echo e(config('wishlist.info.name')); ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="<?php echo e(BeUrl(config('wishlist.info.alias'))); ?>" data-token="<?php echo e(csrf_token()); ?>">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="item"><?php echo e(trans('rating::global.item')); ?></th>
                      <th data-sort="1" data-search="1" data-column="member_id"><?php echo e(trans('rating::global.member')); ?></th>
                      <th data-sort="1" data-search="1" data-column="status" class="col-md-1 nowrap"><?php echo e(trans('global.status')); ?></th>
                      <th data-sort="1" data-search="1" data-column="created_at" class="col-md-1 nowrap"><?php echo e(trans('wishlist::global.created_at')); ?></th>
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
  text-align: center;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>