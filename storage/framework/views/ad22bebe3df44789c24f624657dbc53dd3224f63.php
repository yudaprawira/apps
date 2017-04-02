<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> <?php echo e(val($dataForm, 'form_title')); ?> </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <form method="POST" action="<?php echo e(BeUrl(config('rating.info.alias').'/save')); ?>" id="formData">
                
                <div class="form-group has-feedback">
                    <input type="checkbox" name="status" <?php echo e(isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked'); ?> /> <?php echo e(trans('global.status_active')); ?>

                </div>

                <div class="form-group has-feedback">
                    <label><?php echo e(trans('rating::global.text')); ?></label><span class="char_count"></span>
                    <textarea class="form-control" name="text" maxlength="255"><?php echo e(val($dataForm, 'text')); ?></textarea>
                </div>

                <input type="hidden" name="id" value="<?php echo e(val($dataForm, 'id')); ?>" />
                <input type="hidden" name="member_id" value="<?php echo e(val($dataForm, 'member_id')); ?>" />
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                <button type="submit" class="btn btn-primary btn-flat"><?php echo e(val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add')); ?></button>
                <a href="<?php echo e(BeUrl(config('rating.info.alias').'/edit/0')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_back')); ?></a>
                </form>
                
            </div><!-- /.box-body -->
        </div>
    </div>
</div>