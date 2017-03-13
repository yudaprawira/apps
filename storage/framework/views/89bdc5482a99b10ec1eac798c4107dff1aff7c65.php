

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">SYSTEM LOG</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="<?php echo e(BeUrl('system-log')); ?>" data-token="<?php echo e(csrf_token()); ?>">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="created_at">Waktu</th>
                      <th data-sort="1" data-search="1" data-column="activity">Keterangan</th>
                      <th data-sort="1" data-search="1" data-column="method">Metode</th>
                      <th data-sort="1" data-search="1" data-column="created_by">Pengguna</th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>