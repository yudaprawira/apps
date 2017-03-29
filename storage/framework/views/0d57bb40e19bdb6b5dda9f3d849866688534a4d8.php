<?php $__env->startSection('content'); ?>
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span4 offset4 cart-holder">
                <div class="heading-bar">
                    <h2>KONFIRMASI PEMBAYARAN</h2>
                    <span class="h-line"></span>
                </div>

                <div class="well" style="border-radius: 0;">
                    <form id="formAccount" method="POST" action="" enctype="multipart/form-data">
                        <div class="control-group form-group">
                            <label class="control-label">INVOICE</label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="invoice" maxlength="20" placeholder="BQxxxxxxxxxxxxx" class="" <?php echo val($row, 'invoice') ? 'value="'.val($row, 'invoice').'" readonly' : ''; ?> required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">TRANSFER KE REKENING</label>
                            <div class="controls has-feedback">
                                <select class="span12" name="bank_tujuan">
                                    <?php foreach(getBank() as $b): ?>
                                    <option value="<?php echo e(val($b, 'id')); ?>"><?php echo e(val($b, 'nama_bank')); ?> - A.N. <?php echo e(val($b, 'nama_akun')); ?> - <?php echo e(val($b, 'rekening')); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">BANK YANG DIGUNAKAN</label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="bank_dari" maxlength="20" placeholder="misal : BCA, Mandiri, BRI" class=" " required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">ATAS NAMA</label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="bank_name" maxlength="20" placeholder="Nama pemilik rekening" class=" " required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">JUMLAH NOMINAL</label>
                            <div class="controls has-feedback">
                                <input class="span12 tNum" type="text" name="total" maxlength="20" placeholder="80.000" <?php echo val($row, 'invoice') ? 'value="'.formatNumber(val($row, 'total')).'" readonly' : ''; ?>  required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">LAMPIRKAN BUKTI PEMBAYARAN</label>
                            <div class="controls has-feedback text-center">
                                <img  src="<?php echo e(asset('/global/images/no-image.png')); ?>" id="imagePreview"><br/><br/>
                                <a href="#" class="btn btn-sm btn-flat btn-default btn-small" id="changeImage"><i class="fa fa-pencil"></i> UPLOAD FOTO </a>
                            </div>
                        </div>
                        <br/>
                        <div class="text-center">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <input type="file" name="image" id="inputImage" />
                            <button type="submit" class="btn btn-success">KONFIRMASI</button>
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
#inputImage {
    visibility: hidden;
    width: 0;
    height: 0;
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
#formAccount [type="text"], #formAccount [type="password"] , #formAccount select {
        padding: 20px 10px;
        height: 40px;
        border-radius: 0;  
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){
    
    initNumber();

    //UPLOAD
    if ( $('#changeImage').length>0 && $('#imagePreview').length>0 && $('#inputImage').length>0 )
    {
        $(document).on('click', '#changeImage', function(){
            $('#inputImage').trigger('click');
            return false;
        });
        $(document).on('change', '#inputImage', function(){
            readURL(this, '#imagePreview');
        });
    }

    function readURL(input, elm) 
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();            
            reader.onload = function (e) {
                
                $(elm).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).on('submit', '#formAccount', function(){

        var form = $(this);
        stringToNumForm(form);
        var formData = new FormData();
        formData.append('file', $('#inputImage')[0].files[0]);
        formData.append('post', form.serialize());
        formData.append('_token', '".csrf_token()."');
        

        $.ajax({
            type		: 'POST',
            url			: form.attr('action'),
            data		: formData,
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend	: function(xhr) { loading(1) },
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // if upload property exists
                    myXhr.upload.addEventListener('progress', function(e){
                        var percent = (e.loaded / e.total) * 100;
                        console.log(percent);
                    }, false); // progressbar
                }
                return myXhr;
            },
            error: errorHandler = function() {
                alert('Something went wrong!');
            },
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