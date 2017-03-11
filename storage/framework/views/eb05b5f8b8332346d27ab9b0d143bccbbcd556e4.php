<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo e($title); ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?php echo e(url('system-user/save')); ?>" method="POST" id="formData">
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/level.user')); ?></label>
              <select name="level_id" class="form-control">
                <?php if( $level ): ?>
                    <?php foreach( $level as $k=>$v ): ?>
                        <option value="<?php echo e($k); ?>" <?php echo e(isset($level_id) && $level_id==$k  ? 'selected="selected"' : ''); ?> > <?php echo e($v); ?> </option>
                    <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('kepegawaian/pegawai.name')); ?></label>
              <input type="text" class="form-control" name="pegawai_id" id="pegawai_id" value="<?php echo e(isset($pegawai_id) ? $pegawai_id : ''); ?>" data-populated='<?php echo isset($id) ? json_encode([['id'=>$pegawai_id, 'name'=>$pegawai['nama'].' ['.$pegawai['bagian']['nama'].( $pegawai['golongan'] ? '/'.$pegawai['golongan']:'' ).']']]) : '{}'; ?>' data-source="<?php echo e(url('pegawai/lookup')); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/user.name')); ?></label>
              <input type="text" class="form-control" name="username" value="<?php echo e(isset($username) ? $username : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('system/user.email')); ?></label>
              <input type="text" class="form-control" name="email" value="<?php echo e(isset($email) ? $email : ''); ?>" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('login.input_password')); ?></label>
              <input type="password" class="form-control" name="password" value="" <?php echo e(isset($id) ? '' : 'required="required"'); ?>/>
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('login.repeatpassword')); ?></label>
              <input type="password" class="form-control" name="password_confirmation" value="" <?php echo e(isset($id) ? '' : 'required="required"'); ?> />
            </div>
            <div>
                <small>*<?php echo e(trans('system/user.change_pass')); ?></small>
            </div>
            <br />
            <input type="hidden" name="id" value="<?php echo e(isset($id) ? $id : ''); ?>" />
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <button type="submit" class="btn btn-primary btn-flat"><?php echo e(isset($id) ? trans('global.act_edit') : trans('global.act_add')); ?></button>
            <a href="<?php echo e(url('system-user/edit/0')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_cancel')); ?></a>
        </form>
    </div>
</div>