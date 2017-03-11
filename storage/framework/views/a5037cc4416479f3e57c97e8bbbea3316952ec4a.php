<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo e($title); ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?php echo e(BeUrl('system-menu/save')); ?>" method="POST" id="formData">
            <div class="form-group has-feedback" style="display: none;" id="data-parent">
              <label><?php echo e(trans('system/menu.parent')); ?></label>
              <span class="form-control disabled" disabled="disabled"></span>
              <input type="hidden" class="form-control" name="parent_id" value="" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.name')); ?></label><span class="char_count"></span>
              <input type="text" class="form-control" name="name" maxlength="35" value="<?php echo e(isset($name) ? $name : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.url')); ?></label><span class="char_count"></span>
              <input type="text" class="form-control" name="url" maxlength="35" value="<?php echo e(isset($url) ? $url : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.icon')); ?></label><span class="char_count"></span>
              <input type="text" class="form-control" name="icon" maxlength="15" value="<?php echo e(isset($icon) ? $icon : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/menu.desc')); ?></label><span class="char_count"></span>
              <textarea class="form-control" name="description" maxlength="75"><?php echo e(isset($description) ? $description : ''); ?></textarea>
            </div>
            
            <?php if( !isset($id) ): ?>  
              <input type="checkbox" id="create_module" name="module[check]" value="1" checked="true"/> <?php echo e(trans('system/menu.create_module')); ?>

              <br/>
              <div id="area-module">
                <div class="form-group has-feedback">
                  <label><?php echo e(trans('system/menu.field_name')); ?></label><span class="char_count"></span>
                  <input type="text" class="form-control" name="module[field]" maxlength="15" placeholder="title" />
                </div>
                <div class="form-group has-feedback">
                  <label><?php echo e(trans('system/menu.field_value')); ?></label><span class="char_count"></span>
                  <input type="text" class="form-control" name="module[value]" maxlength="15" placeholder="Judul" />
                </div>
              </div>
              <br/>
            <?php endif; ?>
            
            <input type="hidden" name="id" value="<?php echo e(isset($id) ? $id : ''); ?>" />
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <button type="submit" class="btn btn-primary btn-flat"><?php echo e(isset($id) ? trans('global.act_edit') : trans('global.act_add')); ?></button>
            <a href="<?php echo e(BeUrl('system-menu/edit/0')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_cancel')); ?></a>
        </form>
    </div>
</div>
<?php $__env->startPush('style'); ?>
<style>
#area-module {
    margin: 10px 0;
    background: #eaeaea;
    border: 1px solid #ddd;
    padding: 5px;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){

  $("#create_module").on('ifChanged', function(e){
      var isChecked = e.target.checked;
      if (isChecked)
        $('#area-module').slideDown();
      else
        $('#area-module').slideUp();
    });
})
</script>
<?php $__env->stopPush(); ?>