<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(BeUrl(config('member.info.alias').'/save')); ?>" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> <?php echo e(trans('member::global.image')); ?> </h3>
                    <a href="#" class="btn btn-sm btn-flat btn-default pull-right" id="changeImage"><i class="fa fa-pencil"></i> <?php echo e(trans('member::global.change_image')); ?> </a>
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
                  
                    <div class="form-group has-feedback">
                        <input type="checkbox" name="status" <?php echo e(isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked'); ?> /> <?php echo e(trans('global.status_active')); ?>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.nama')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="nama" maxlength="125" value="<?php echo e(val($dataForm, 'nama')); ?>" />
                            </div>
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.email')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="email" maxlength="75" value="<?php echo e(val($dataForm, 'email')); ?>" />
                            </div>
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.telepon')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="telepon" maxlength="20" value="<?php echo e(val($dataForm, 'telepon')); ?>" />
                            </div>
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.kode_pos')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="kodepos" maxlength="5" value="<?php echo e(val($dataForm, 'kodepos')); ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.alamat')); ?></label><span class="char_count"></span>
                                <textarea class="form-control" name="alamat" maxlength="255"><?php echo e(val($dataForm, 'alamat')); ?></textarea>
                            </div>
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.provinsi')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="provinsi" maxlength="30" value="<?php echo e(val($dataForm, 'provinsi')); ?>" />
                            </div>
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.kota')); ?></label><span class="char_count"></span>
                                <input type="text" class="form-control" name="kota" maxlength="35" value="<?php echo e(val($dataForm, 'kota')); ?>" />
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.password')); ?></label><span class="char_count"></span>
                                <input type="password" class="form-control" name="password" maxlength="255" <?php echo e(val($dataForm, 'id') ? '':'required'); ?> />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label><?php echo e(trans('member::global.repassword')); ?></label><span class="char_count"></span>
                                <input type="password" class="form-control" name="ulangi_password" maxlength="255" <?php echo e(val($dataForm, 'id') ? '':'required'); ?>/>
                            </div>
                        </div>
                    </div>
                    <i>
                    <?php if( val($dataForm, 'id') ): ?>
                    <?php echo e(trans('member::global.txtpassword')); ?>

                    <?php endif; ?>
                    </i><br/><br/>
                    

                    <input type="hidden" name="id" value="<?php echo e(val($dataForm, 'id')); ?>" />
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <input type="file" name="image" id="inputImage" />
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo e(val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add')); ?></button>
                    <a href="<?php echo e(BeUrl(config('member.info.alias'))); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_back')); ?></a>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
#imagePreview {
    width: 100%;
}
#inputImage {
    height: 0;
    width: 0;
    visibility: hidden;
}
textarea{
    resize: vertical;
    min-height: 108px;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>