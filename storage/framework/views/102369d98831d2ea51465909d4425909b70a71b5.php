<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo e($title); ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?php echo e(url('system-level/save')); ?>" method="POST" id="formData">
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/level.name')); ?></label><span class="char_count"></span>
              <input type="text" class="form-control" name="name" maxlength="20" value="<?php echo e(isset($name) ? $name : ''); ?>" />
            </div>
            <input type="hidden" name="id" value="<?php echo e(isset($id) ? $id : ''); ?>" />
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <button type="submit" class="btn btn-primary btn-flat"><?php echo e(isset($id) ? trans('global.act_edit') : trans('global.act_add')); ?></button>
            <a href="<?php echo e(url('system-level/edit/0')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_cancel')); ?></a>
        </form>
    </div>
</div>