<?php $__env->startSection('content'); ?>
    <?php echo Lang::get('login.email_reset', ['username'=>$username, 'link'=>$link]); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make( 'global.emails.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>