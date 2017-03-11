<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo e($title); ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?php echo e(url('system-menu/save')); ?>" method="POST" id="formData">
            <div class="form-group has-feedback" style="display: none;" id="data-parent">
              <label><?php echo e(trans('system/menu.parent')); ?></label>
              <span class="form-control disabled" disabled="disabled"></span>
              <input type="hidden" class="form-control" name="parent_id" value="" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.name')); ?></label>
              <input type="text" class="form-control" name="name" value="<?php echo e(isset($name) ? $name : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.url')); ?></label>
              <input type="text" class="form-control" name="url" value="<?php echo e(isset($url) ? $url : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.icon')); ?></label>
              <input type="text" class="form-control" name="icon" value="<?php echo e(isset($icon) ? $icon : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.desc')); ?></label>
              <textarea class="form-control" name="description"><?php echo e(isset($description) ? $description : ''); ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo e(isset($id) ? $id : ''); ?>" />
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <button type="submit" class="btn btn-primary btn-flat"><?php echo e(isset($id) ? trans('global.act_edit') : trans('global.act_add')); ?></button>
            <a href="<?php echo e(url('system-menu/edit/0')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_cancel')); ?></a>
        </form>
    </div>
</div>