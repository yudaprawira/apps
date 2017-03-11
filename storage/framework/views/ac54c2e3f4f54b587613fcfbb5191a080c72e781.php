

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo e(trans('system/user.title')); ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="<?php echo e(BeUrl('system-user')); ?>" data-token="<?php echo e(csrf_token()); ?>">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="id" style="width: 10px">#</th>
                      <th data-sort="1" data-search="1" data-column="username"><?php echo e(trans('system/user.name')); ?></th>
                      <th data-sort="1" data-search="1" data-column="email"><?php echo e(trans('system/user.email')); ?></th>
                      <th data-sort="1" data-search="1" data-column="last_login"><?php echo e(trans('system/user.lastlogin')); ?></th>
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
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>