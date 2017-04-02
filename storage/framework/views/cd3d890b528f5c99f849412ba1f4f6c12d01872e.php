<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(BeUrl(config('book.info.alias').'/save')); ?>" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                        <div class="col-md-1 nowrap">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="status" <?php echo e(isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked'); ?> /> <?php echo e(trans('global.status_active')); ?>

                            </div>
                        </div>

                    <a href="#" class="btn btn-sm btn-flat btn-default pull-right" id="changeImage"><i class="fa fa-pencil"></i> <?php echo e(trans('book::global.change_image')); ?> </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="text-center">
                        <img  src="<?php echo e(val($dataForm, 'image') ? asset('media/'.val($dataForm, 'image')) : asset('/global/images/no-image.png')); ?>" id="imagePreview">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> <?php echo e(val($dataForm, 'form_title')); ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="rekomendasi" <?php echo e(isset($dataForm['rekomendasi']) ? (val($dataForm, 'rekomendasi')=='1' ? 'checked' : '') : ''); ?> /> <?php echo e(trans('book::global.rekomendasi')); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="headline" <?php echo e(isset($dataForm['headline']) ? (val($dataForm, 'headline')=='1' ? 'checked' : '') : ''); ?> /> <?php echo e(trans('book::global.headline')); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="tersedia" <?php echo e(isset($dataForm['tersedia']) ? (val($dataForm, 'tersedia')=='1' ? 'checked' : '') : 'checked'); ?> /> <?php echo e(trans('book::global.tersedia')); ?>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="terjual" <?php echo e(isset($dataForm['terjual']) ? (val($dataForm, 'terjual')=='1' ? 'checked' : '') : ''); ?> /> <?php echo e(trans('book::global.terjual')); ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-feedback">
                                <label class="required"><?php echo e(trans('book::global.title')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="title" maxlength="125" value="<?php echo e(val($dataForm, 'title')); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.kategori')); ?></label>
                                <select class="form-control select2" name="kategori">
                                <option>-------------------</option>
                                <?php foreach($select_categories as $c=>$v): ?>
                                    <option value="<?php echo e($c); ?>" <?php echo e(val($dataForm, 'kategori')==$c?'selected':''); ?> ><?php echo e($v); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.penulis')); ?></label><span class="char_count"></span>
                                <select class="form-control select2" name="pengarang">
                                <option>-------------------</option>
                                <?php foreach($select_pengarang as $c=>$v): ?>
                                    <option value="<?php echo e($c); ?>" <?php echo e(val($dataForm, 'pengarang')==$c?'selected':''); ?> ><?php echo e($v); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.penerbit')); ?></label><span class="char_count"></span>
                                <select class="form-control select2" name="penerbit">
                                <option>-------------------</option>
                                <?php foreach($select_penerbit as $c=>$v): ?>
                                    <option value="<?php echo e($c); ?>" <?php echo e(val($dataForm, 'penerbit')==$c?'selected':''); ?> ><?php echo e($v); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.isbn')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="isbn" maxlength="125" value="<?php echo e(val($dataForm, 'isbn')); ?>" />
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.rilis')); ?></label>
                                <input type="number" style="padding-right: 0;" class="form-control" name="rilis" maxlength="50" value="<?php echo e(val($dataForm, 'rilis')); ?>" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.halaman')); ?></label><span class="char_count"></span>
                                <div class="input-group">
                                    <input type="number" style="padding-right: 0;" class="form-control" name="halaman" maxlength="5" value="<?php echo e(val($dataForm, 'halaman')); ?>" />
                                    <span class="input-group-addon"><?php echo e(trans('book::global.lembar')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.berat')); ?></label><span class="char_count"></span>
                                <div class="input-group">
                                    <input type="text" class="form-control tDec" name="berat" maxlength="5" value="<?php echo e(val($dataForm, 'berat')); ?>" />
                                    <span class="input-group-addon">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.bahasa')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="bahasa" maxlength="50" value="<?php echo e(val($dataForm, 'bahasa')); ?>" />
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('book::global.harga_sebelum')); ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control tNum" name="harga_sebelum" maxlength="15" value="<?php echo e(val($dataForm, 'harga_sebelum') ? formatNumber(val($dataForm, 'harga_sebelum')) : 0); ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="required"><?php echo e(trans('book::global.harga')); ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control tNum" name="harga" maxlength="15" value="<?php echo e(formatNumber(val($dataForm, 'harga'))); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="required"><?php echo e(trans('book::global.deskripsi')); ?></label><span class="char_count"></span>
                                <textarea class="form-control" name="deskripsi"><?php echo e(val($dataForm, 'deskripsi')); ?></textarea>
                            </div>
                        </div>
                    </div>



                    <input type="hidden" name="id" value="<?php echo e(val($dataForm, 'id')); ?>" />
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <input type="file" name="image" id="inputImage" />
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo e(val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add')); ?></button>
                    <a href="<?php echo e(BeUrl(config('book.info.alias'))); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_back')); ?></a>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('/global/js/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
<script>
$(document).ready(function(){
    initNumber();
    $(document).on('submit', 'form', function(){
        stringToNumForm($(this));
    });
});

tinymce.init({ 
    selector:'textarea',
    height: 200,
    theme: 'modern', 
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ] 
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>