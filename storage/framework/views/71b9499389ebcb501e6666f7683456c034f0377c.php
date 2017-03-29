<?php $__env->startSection('content'); ?>
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span8 offset2 cart-holder">
                <div class="heading-bar">
                    <h2>REGISTER</h2>
                    <span class="h-line"></span>
                </div>

                <div class="well" style="border-radius: 0;">
                    <form id="formAccount" method="POST" action="<?php echo e(url('member/do-register')); ?>">
                        
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group form-group">
                                    <label class="control-label">Nama <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="span12" type="text" name="nama" maxlength="75" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Email <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="span12" type="email" name="email" maxlength="75" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Telepon <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="span12" type="text" required name="telepon" maxlength="20" placeholder="" class=" ">
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Kode Pos <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="span12" type="text" name="kodepos" maxlength="5" placeholder="" class=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group form-group">
                                    <label class="control-label">Alamat <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <textarea class="span12" name="alamat" maxlength="255" placeholder="" class=" " required></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Provinsi <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="span12" type="text" name="provinsi" maxlength="30" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Kota <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="span12" type="text" name="kota" maxlength="35" placeholder="" class=" " required>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="hidden" name="_next" value="<?php echo e(val($_GET,'next')); ?>" />
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <button type="submit" class="btn btn-success">REGISTER</button>
                        </div>

                        <br/><br/>
                        <div class="text-center">
                            <i>Sudah punya akun? <a href="<?php echo e(url('member/login?next='.urlencode(val($_GET,'next')))); ?>">login di sini</a></i>
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
sup {
    color: red;
}
.char_count{
    float: right;
    font-size: 12px;
    color: #bbb;
    margin-top: 5px;
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
#formAccount [type="text"], #formAccount [type="email"], #formAccount [type="password"] {
        padding: 20px 10px;
}
#formAccount textarea{
    min-height: 129px!important;
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