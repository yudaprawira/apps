<?php $__env->startSection('content'); ?>
    test detail <?php echo e($row->title); ?> <br/>
    test url <?php echo e($row->url); ?> <br/>
    test content <?php echo $row->text; ?> <br/>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>