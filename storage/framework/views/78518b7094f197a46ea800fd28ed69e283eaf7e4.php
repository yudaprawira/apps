<?php $__env->startSection('content'); ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="/">ADMIN</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><?php echo e(Lang::get('login.text_caption')); ?></p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="<?php echo e(Lang::get('login.input_email')); ?>" value="<?php echo e($username); ?>" required="required"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="<?php echo e(Lang::get('login.input_password')); ?>" required="required"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember_me"/> <?php echo e(Lang::get('login.text_remember')); ?>

                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>  
              <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(Lang::get('login.btn_signin')); ?></button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="<?php echo e(config('app.url')); ?>/reset-password"><?php echo e(Lang::get('login.text_forgot')); ?></a><br/>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master_less', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>