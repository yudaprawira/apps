<div class="panel-group" id="accordionImport">
 <form method="POST" action="<?php echo e(url('presensi/import')); ?>" id="formImport">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
  <?php $c=1 ;?>
  <?php if( !empty($return) ): ?>
    <?php foreach( $return as $tgl=>$value ): ?>
        <div class="panel no-radius panel-default">
            <div class="panel-heading">
              <h4 class="panel-title text-left">
                <a data-toggle="collapse" data-parent="#accordionImport" href="#collapse<?php echo e($c); ?>">
                   <?php echo e(trans('aktivitas/presensi.date')); ?> <?php echo e(formatDate($tgl)); ?>

                </a>
              </h4>
            </div>
            <div id="collapse<?php echo e($c); ?>" class="panel-collapse collapse <?php echo e($c==1?'in':''); ?>">
              <div class="panel-body no-padding">
                <table class="table table-striped table-bordered nowrap table-condensed" style="margin-bottom: 0px;">
                    <thead>
                        <th class="text-center">ID</th> 
                        <th class="text-center"><?php echo e(trans('kepegawaian/pegawai.name')); ?></th> 
                        <th class="text-center"><?php echo e(trans('aktivitas/presensi.time_start')); ?></th>
                        <th class="text-center"><?php echo e(trans('aktivitas/presensi.time_end')); ?></th>
                    </thead>
                    <tbody>
                    <?php foreach( $value as $v ): ?>
                        <tr>
                            <td class="text-center"><?php echo e($v[0]); ?></td> 
                            <td class="text-left"><?php echo e($v[1]); ?></td>
                            <td class="text-center"> <?php echo e(date('d-m-Y H:i:s', strtotime($v['time_in']))); ?>  <input type="hidden" name="import_in[<?php echo e(strtotime($tgl)); ?>][<?php echo e($v[0]); ?>]" value="<?php echo e(strtotime($v['time_in'])); ?>" /></td>
                            <td class="text-center"> <?php echo e(date('d-m-Y H:i:s', strtotime($v['time_out']))); ?> <input type="hidden" name="import_out[<?php echo e(strtotime($tgl)); ?>][<?php echo e($v[0]); ?>]" value="<?php echo e(strtotime($v['time_out'])); ?>" /></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    <?php $c++ ;?>        
    <?php endforeach; ?>
  <?php endif; ?>
  </form>
</div>