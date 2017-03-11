

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Module</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <form method="POST">
                    <table class="table table-striped table-bordered" id="list-module">
                      <thead>
                      <tr>
                        <th class="text-center" style="width: 10px;"><input type="checkbox" id="checkAll"></th>
                        <th class="col-md-3"><?php echo e(trans('system/module.name')); ?></th>
                        <th><?php echo e(trans('system/module.desc')); ?></th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach( $rowMods as $k=>$m ): ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" class="check-module" name="modules[]" value="<?php echo e($k); ?>" /></td>
                          <td>
                            <?php echo text(val($m, 'name'), val($m, 'active'), 'module-enable', 'module-disabled'); ?>

                            <br/>
                            <?php if( val($m, 'active') ): ?>
                              <a href="#" class="link-actv"><?php echo e(trans('system/module.inactivate')); ?></a>
                            <?php else: ?>
                              <a href="#" class="link-inactv"><?php echo e(trans('system/module.activate')); ?></a>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php echo e(val($m, 'description', '-')); ?>

                            <br/>
                            <?php echo e(trans('system/module.version')); ?> <?php echo e(val($m, 'info.version')); ?> |
                            <?php echo e(trans('system/module.author')); ?> <?php echo linkable(val($m, 'author.name'), val($m, 'author.site'), '_blank'); ?> 
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2">
                            <div class="row">
                              <div class="col-md-8">
                                <select name="act" class="form-control btn-flat">
                                  <option><?php echo e(trans('system/module.actions')); ?></option>
                                  <option value="true"><?php echo e(trans('system/module.activate')); ?></option>
                                  <option value="false"><?php echo e(trans('system/module.inactivate')); ?></option>
                                </select>  
                              </div>
                              <div class="col-md-4" style="padding-left: 0;">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/> 
                                <button type="submit" class="btn btn-flat btn-default"><?php echo e(trans('global.apply')); ?></button>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </form>
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
  .module-enable {
    font-weight: bold;
  }
  .module-disabled {
    color: #949494;
  }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
  $(document).ready(function(){

    $("#checkAll").on('ifChanged', function(e){
      var isChecked = e.target.checked;
      if (isChecked)
        $('.check-module').iCheck('check');
      else
        $('.check-module').iCheck('uncheck');
    });

    $(document).on("click", ".link-actv, .link-inactv", function(){
      $(this).closest('tr').find('[type=checkbox]').iCheck('check');
      
      if ( $(this).attr('class')=='link-actv' )
        $('[name=act]').val("false");
      else
        $('[name=act]').val("true");

        $(this).closest('form').submit();
        
      return false;
    });

  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>