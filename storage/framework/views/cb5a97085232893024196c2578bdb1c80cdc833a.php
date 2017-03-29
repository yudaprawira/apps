<?php $__env->startSection('content'); ?>
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span4 offset4 cart-holder">
                <div class="heading-bar">
                    <h2>LOGIN</h2>
                    <span class="h-line"></span>
                </div>

                <div class="well" style="border-radius: 0;">
                    <form id="formAccount" method="POST" action="<?php echo e(url('member/do-login')); ?>">
                        <div class="control-group form-group">
                            <label class="control-label">Username </label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="username" maxlength="50" placeholder="" class=" " required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">Password </label>
                            <div class="controls has-feedback">
                                <input class="span12" type="password" name="password" maxlength="255" placeholder="" class=" " required>
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="_next" value="<?php echo e(val($_GET,'next')); ?>" />
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <button type="submit" class="btn btn-success">LOGIN</button>
                        </div>

                        <br/><br/>
                        <div class="text-center">
                            <i>Belum punya akun? <a href="<?php echo e(url('member/register?next='.urlencode(val($_GET,'next')))); ?>">daftar sekarang</a></i>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
#formAccount{
    margin: 0;
}
#formAccount [type="submit"] {
    border: 0;
    font-size: 14px;
    color: #fff;
    padding: 10px 20px;
    background: #98b827;
    cursor: pointer;
    transition: width 1s;
    -moz-transition: 1s;
    -webkit-transition: 1s;
    -o-transition: 1s;
}
#formAccount [type="text"], #formAccount [type="password"] {
        padding: 20px 10px;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){
    $(document).on('submit', '#formAccount', function(){
        
        var frm = $(this);

        $.ajax({
            type		: 'POST',
            url			: frm.attr('action'),
            data		: frm.serialize(),
            beforeSend	: function(xhr) { loading(1); },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status == true )
                {
                    if ( dt.redirect ) 
                    {
                        window.location.href = dt.redirect;
                    }
                    else
                    {
                        window.location.reload();
                    }
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>