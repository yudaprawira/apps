<?php $__env->startSection('content'); ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><?php echo e(Lang::get('login.title_reset')); ?></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><?php echo e(Lang::get('login.text_reset')); ?></p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="<?php echo e(Lang::get('login.input_email')); ?>" value="" required="required"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
                  <a href="<?php echo e(BeUrl('login')); ?>" class="btn btn-default btn-flat"><?php echo e(Lang::get('login.btn_signin')); ?></a>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>  
              <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(Lang::get('login.btn_reset')); ?></button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master_less', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>