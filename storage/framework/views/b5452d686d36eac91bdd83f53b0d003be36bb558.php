<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(Lang::get('login.title_reset')); ?> | <?php echo e(config('app.title')); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/global/font-awesome-4.6.1/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/global/ionicons-master/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Main -->
    <link rel="stylesheet" href="/global/css/main.css"/>
  </head>
  <body class="hold-transition login-page">
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
                  <a href="<?php echo e(config('app.url')); ?>/login" class="btn btn-default btn-flat"><?php echo e(Lang::get('login.btn_signin')); ?></a>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>  
              <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(Lang::get('login.btn_reset')); ?></button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
    <!-- Notification -->
    <?php echo $notif; ?>


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e($pub_url); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo e($pub_url); ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo e($pub_url); ?>/plugins/iCheck/icheck.min.js"></script>
    <!-- Notif -->
    <script src="/global/js/jquery.bootstrap-growl.min.js"></script>
    <!-- Main -->
    <script src="/global/js/main.js"></script>
    <script>
      $(function () {
        $('[name=username]').focus();
      });
    </script>
  </body>
</html>
