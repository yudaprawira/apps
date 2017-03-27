<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <?php echo e(val($dataForm, 'form_title')); ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <form method="POST" action="<?php echo e(BeUrl(config('halaman.info.alias').'/save')); ?>">
                    
                    <div class="form-group has-feedback">
                        <input type="checkbox" name="status" <?php echo e(isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked'); ?> /> <?php echo e(trans('global.status_active')); ?>

                    </div>

                    <div class="form-group has-feedback">
                        <label><?php echo e(trans('halaman::global.title')); ?></label><span class="char_count"></span>
                        <input type="text" class="form-control" name="title" maxlength="125" value="<?php echo e(val($dataForm, 'title')); ?>" />
                    </div>
                    <div class="form-group has-feedback">
                        <label><?php echo e(trans('halaman::global.text')); ?></label><span class="char_count"></span>
                        <textarea class="form-control" name="text"><?php echo e(val($dataForm, 'text')); ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?php echo e(val($dataForm, 'id')); ?>" />
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo e(val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add')); ?></button>
                    <a href="<?php echo e(BeUrl(config('halaman.info.alias'))); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_back')); ?></a>
                  </form>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('/global/js/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
<script>
tinymce.init({ 
    selector:'textarea',
    height: 300,
    theme: 'modern', 
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ] 
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>