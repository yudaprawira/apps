

<?php $__env->startSection('content'); ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><?php echo e(Lang::get('passwords.text_caption')); ?></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <form method="post">
          <div class="form-group has-feedback">
            <input type="password" name="old_password" class="form-control" placeholder="<?php echo e(Lang::get('passwords.input_oldpass')); ?>" value="" required="required"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="new_password" class="form-control" placeholder="<?php echo e(Lang::get('passwords.input_newpass')); ?>" required="required"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="<?php echo e(Lang::get('passwords.input_repass')); ?>" required="required"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <a href="<?php echo e(config('app.url')); ?>" class="btn btn-default btn-flat"><?php echo e(Lang::get('passwords.btn_chancel')); ?></a>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>  
              <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(Lang::get('passwords.btn_change')); ?></button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master_less', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>