<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(config('app.title')); ?></title>
  </head>
  <body style="background: #EAEAEA;padding: 25px 0;">
    <div style="background: #FFF; width: 90%; margin: 25px auto;">
        <h1 style="background: #3c8dbc; color: #FFF; padding: 10px 20px; font-size: 18px;"><?php echo e(config('app.title')); ?></h1>
        <div style="padding: 20px;">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
  </body>
</html>