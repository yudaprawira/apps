<div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo e($title); ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?php echo e(url('bagian/save')); ?>" method="POST" id="formData">
            <div class="form-group has-feedback">
              <label><?php echo e(trans('kepegawaian/bagian.name')); ?></label></label><span class="char_count"></span>
              <input type="text" class="form-control" name="nama" value="<?php echo e(isset($nama) ? $nama : ''); ?>" maxlength="20" />
            </div>
            <div class="row">
                <div class="col-md-6">                
                    <div class="form-group has-feedback">
                      <label><?php echo e(trans('kepegawaian/bagian.type_gaji')); ?></label></label>
                      <select class="form-control select2" name="tipe">
                        <option value="brg" <?php echo e(isset($tipe) && $tipe=='brg' ? 'selected="selected"' : ''); ?> ><?php echo e(trans('kepegawaian/bagian.type_brg')); ?></option>
                        <option value="bln" <?php echo e(isset($tipe) && $tipe=='bln' ? 'selected="selected"' : ''); ?> ><?php echo e(trans('kepegawaian/bagian.type_bln')); ?></option>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <label><?php echo e(trans('kepegawaian/bagian.max_gol')); ?> <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('kepegawaian/bagian.max_gol_lbl')); ?>"></i></label></label>
                      <input type="number" class="form-control text-center" name="maks_golongan" value="<?php echo e(isset($maks_golongan) ? $maks_golongan : 0); ?>" maxlength="2" style="padding-right: 5px;" />
                    </div>
                </div>
            </div>

            <div class="form-group has-feedback">
              <label><?php echo e(trans('kepegawaian/bagian.jkn')); ?></label></label><span class="char_count"></span>
              <input type="text" class="form-control tNum" name="jkn" value="<?php echo e(isset($jkn) ? formatNumber($jkn, 2) : ''); ?>" maxlength="20" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('kepegawaian/bagian.jl1')); ?></label></label><span class="char_count"></span>
              <input type="text" class="form-control tNum" name="jl1" value="<?php echo e(isset($jl1) ? formatNumber($jl1, 2) : ''); ?>" maxlength="10" />
            </div>
            <div class="form-group has-feedback">
              <label><?php echo e(trans('kepegawaian/bagian.jl2')); ?></label></label><span class="char_count"></span>
              <input type="text" class="form-control tNum" name="jl2" value="<?php echo e(isset($jl2) ? formatNumber($jl2, 2) : ''); ?>" maxlength="10" />
            </div>
            <div class="form-group has-feedback non-borongan" <?php echo isset($tipe) && $tipe=='brg' ? 'style="display: none;"' : ''; ?>>
              <label><?php echo e(trans('kepegawaian/bagian.jl3')); ?></label></label><span class="char_count"></span>
              <input type="text" class="form-control tNum" name="jl3" value="<?php echo e(isset($jl3) ? formatNumber($jl3, 2) : ''); ?>" maxlength="10" />
            </div>
            <div class="form-group has-feedback non-borongan" <?php echo isset($tipe) && $tipe=='brg' ? 'style="display: none;"' : ''; ?>>
              <label><?php echo e(trans('kepegawaian/bagian.jl4')); ?></label></label><span class="char_count"></span>
              <input type="text" class="form-control tNum" name="jl4" value="<?php echo e(isset($jl4) ? formatNumber($jl4, 2) : ''); ?>" maxlength="10" />
            </div>
            
            <input type="hidden" name="id" value="<?php echo e(isset($id) ? $id : ''); ?>" />
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <button type="submit" class="btn btn-primary btn-flat"><?php echo e(isset($id) ? trans('global.act_edit') : trans('global.act_add')); ?></button>
            <a href="<?php echo e(url('bagian/edit/0')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_cancel')); ?></a>
        </form>
    </div>
</div>