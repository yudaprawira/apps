<?php $__env->startSection('content'); ?>
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2>LOGIN</h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?php echo e(url('/')); ?>">BERANDA</a></li>
                <li><a href="<?php echo e(url('member')); ?>">MEMBER</a></li>
                <li><a href="<?php echo e(url('member/login')); ?>">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="col-md-4 col-md-offset-4 cart-holder">
                
                <div class="panel panel-default">
                    <div class="panel-heading">LOGIN</div>
                    <div class="panel-body">
                        <form class="sending-form formAccountLogin" method="POST" action="<?php echo e(url('member/do-login')); ?>">
                            <div class="form-group has-feedback">
                                <input class="form-control" required="required" name="username" placeholder="Username" maxlength=50>
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <input class="form-control" type="password" name="password" required="required" maxlength=255 placeholder="Password">
                                <i class="fa fa-key"></i>
                            </div>
                            <button class="btn-1 sm shadow-0 full-width" type="submit">LOGIN</button>

                            <br/><br/>
                            <div class="text-center">
                                <i>Belum punya akun? <a href="<?php echo e(url('member/register?next='.urlencode(val($_GET,'next')))); ?>">daftar sekarang</a></i>
                            </div>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        </form>
                    </div>
                </div>
                    
            </section>
        </section>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
#formAccountLogin{
    margin: 0;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>