<?php $__env->startSection('content'); ?>
    test content 12 aaabbbcccdddeeefff <?php echoPre($_SERVER['REQUEST_URI']) ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>