<li class="dd-item dd3-item" data-id="<?php echo e($id); ?>" id="listnested-<?php echo e($id); ?>">
    <div class="dd-handle dd3-handle fa fa-<?php echo e($icon); ?>"></div>
    <div class="dd3-content clearfix"><?php echo e($name); ?> 
        <div class="pull-right" style="margin-top: -2px;">
            <button type="button" class="btn btn-info btn-flat btn-xs" title="<?php echo e(trans('global.delete')); ?>" data-toggle="modal" data-target="#modalAccess-<?php echo e($id); ?>" data-backdrop="static"> <i class="fa fa-users"></i> </button>
            <a href="#" class="btn btn-xs btn-primary btn-flat btn-add" title="<?php echo e(trans('global.add')); ?>" data-id="<?php echo e($id); ?>" data-name="<?php echo e($name); ?>"><i class="glyphicon glyphicon-plus"></i></a>
            <a href="<?php echo e(url('system-menu/edit/'.$id)); ?>" title="<?php echo e(trans('global.edit')); ?>" class="btn btn-xs btn-success btn-flat btn-edit"><i class="glyphicon glyphicon-pencil"></i></a>
            <button type="button" class="btn btn-danger btn-flat btn-xs" title="<?php echo e(trans('global.delete')); ?>" data-toggle="modal" data-target="#modalConfirmation-<?php echo e($id); ?>" data-backdrop="static"> <i class="glyphicon glyphicon-trash"></i> </button>
        </div>
    </div>
    <?php echo $sub; ?>

    
        <!-- Modal Level Access -->
        <div class="modal fade modalAccess" id="modalAccess-<?php echo e($id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalAccess-<?php echo e($id); ?>-Label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content box">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modalAccess-<?php echo e($id); ?>-Label"><?php echo e(trans('global.confirm_access')); ?></h4>
              </div>
              <form method="POST" action="<?php echo e(url('system-menu/access/'.$id)); ?>" class="form-access">
                  <div class="modal-body">
                    <?php echo trans('global.access_text', ['menu'=>$name]); ?>

                    <?php if( !empty($level) ): ?> 
                    <ul style="margin: 0; padding: 0; list-style: none;">
                        <?php foreach( $level as $k=>$v ): ?>
                            <li> 
                                <div class="checkbox icheck">
                                    <label>
                                      <input type="checkbox" name="access[<?php echo e($k); ?>]" <?php echo e(isset($access[$k]) ? 'checked="checked"' : ''); ?> /> <?php echo e($v); ?>

                                    </label>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                  </div>
                  <div class="modal-footer">
                    
                    <div class="pull-left">
                        <input type="checkbox" class="checkAll" /> <?php echo e(trans('global.all')); ?>

                    </div>
                    
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><?php echo e(trans('global.act_close')); ?></button>
                    <button type="submit" class="btn btn-primary btn-flat btn-saveAccess"><?php echo e(trans('global.save')); ?></button>
                  </div>
                  <div class="overlay access-loding" style="display: none;">
                      <i class="fa fa-refresh fa-spin"></i>
                  </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal DELETE -->
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
                <a href="<?php echo e(url('system-menu/delete/'.$id)); ?>" data-id="#listnested-<?php echo e($id); ?>" class="btn btn-primary btn-flat btn-delete"><?php echo e(trans('global.delete')); ?></a>
              </div>
              
              <div class="overlay delete-loding" style="display: none;">
                  <i class="fa fa-refresh fa-spin"></i>
              </div>
            </div>
          </div>
        </div>

</li>