<?php $__env->startSection('content'); ?>
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2>REGISTER</h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?php echo e(url('/')); ?>">BERANDA</a></li>
                <li><a href="<?php echo e(url('member')); ?>">MEMBER</a></li>
                <li><a href="<?php echo e(url('member/register')); ?>">REGISTER</a></li>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span8 offset2 cart-holder">
                
                <div class="well" style="border-radius: 0;">
                    <form id="formAccount" method="POST" action="<?php echo e(url('member/do-register')); ?>">
                        
                        <div class="row-fluid">
                            <div class="col-md-6">
                                <div class="control-group form-group">
                                    <label class="control-label">Nama <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="text" name="nama" maxlength="75" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Email <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="email" name="email" maxlength="75" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Telepon <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="text" required name="telepon" maxlength="20" placeholder="" class=" ">
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Password <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="password" required name="password" maxlength="255" placeholder="" class=" ">
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Ulangi Password <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="password" required name="ulangi_password" maxlength="255" placeholder="" class=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group form-group">
                                    <label class="control-label">Alamat <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <textarea class="form-control" name="alamat" maxlength="255" placeholder="" class=" " required></textarea>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Provinsi <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="text" name="provinsi" maxlength="30" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Kota <sup>*</sup> <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="text" name="kota" maxlength="35" placeholder="" class=" " required>
                                    </div>
                                </div>
                                <div class="control-group form-group">
                                    <label class="control-label">Kode Pos <span class="char_count"></span></label>
                                    <div class="controls has-feedback">
                                        <input class="form-control" type="text" name="kodepos" maxlength="5" placeholder="" class=" ">
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <div class="text-center">
                            <input type="hidden" name="_next" value="<?php echo e(val($_GET,'next')); ?>" />
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <button type="submit" class="btn-1 sm shadow-0">REGISTER</button>
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
</main>
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
textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], input, .form-control{
    background: #FFF!important;
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