<div class="text-center">
    <!--div class="btn-group"-->
      <a href="<?php echo e($url_edit); ?>" class="btn btn-default btn-flat btn-xs btn-edit" title="<?php echo e(trans('global.edit')); ?>"> <i class="glyphicon glyphicon-pencil"></i> <?php echo e(trans('global.edit')); ?></a>
      <button type="button" class="btn btn-danger btn-flat btn-xs" title="<?php echo e(trans('global.delete')); ?>" data-toggle="modal" data-target="#modalConfirmation-<?php echo e($id); ?>" data-backdrop="static"> <i class="glyphicon glyphicon-trash"></i> </button>
    <!--/div-->
</div>

<!-- Modal -->
<div class="modal fade modalConfirmation" id="modalConfirmation-<?php echo e($id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalConfirmation-<?php echo e($id); ?>-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content box">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="modalConfirmation-<?php echo e($id); ?>-Label"><?php echo e(trans('global.confirm_del')); ?></h4>
      </div>
      <div class="modal-body">
        <?php echo trans('global.confirm_text', ['name'=>$name]); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><?php echo e(trans('global.act_close')); ?></button>
        <a href="<?php echo e($url_delete); ?>" class="btn btn-danger btn-flat btn-delete"><?php echo e(trans('global.delete')); ?></a>
      </div>
      
      <div class="overlay delete-loding" style="display: none;">
          <i class="fa fa-refresh fa-spin"></i>
      </div>
    </div>
  </div>
</div>