<table class="table table-bordered table-hover table-striped table-condensed box"  style="background: #fff;" changed="0" id="tb-eblek">
    <thead>
        <tr>
            <th colspan="3"><?php echo e(trans('aktivitas/produksi.hari')); ?></th> 
            <?php foreach( $date_eblek as $v ): ?>
            <th colspan="6"><?php echo e(strtoupper($v['hari'])); ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <th colspan="3"><?php echo e(trans('aktivitas/produksi.tanggal')); ?></th> 
            <?php foreach( $date_eblek as $v ): ?>
            <th colspan="6"><?php echo e($v['tgl']); ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <th colspan="3"><?php echo e(trans('aktivitas/produksi.jam')); ?></th> 
            <?php foreach( $date_eblek as $v ): ?>
            <th colspan="6"><?php echo e($v['jam']); ?></th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <th><?php echo e(trans('aktivitas/produksi.no')); ?></th> 
            <th><?php echo e(trans('aktivitas/produksi.nama')); ?></th> 
            <th><?php echo e(trans('aktivitas/produksi.status')); ?></th> 
            <?php foreach( $date_eblek as $v ): ?>
            <th colspan="3"><?php echo e(trans('aktivitas/produksi.plan')); ?></th>
            <th colspan="3"><?php echo e(trans('aktivitas/produksi.actual')); ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php $total = []; $totalPresensi = []; $no=1; ?>
        <?php foreach($pegawai as $id=>$p): ?>
        <tr>
            <td class="text-center"><?php echo e(($no)); ?></td>
            <td title="NIP:<?php echo e($p['NIP']); ?>, ID : <?php echo e($id); ?> " style="white-space: nowrap;"><?php echo e($p['nama']); ?></td>
            <td class="text-center"><?php echo e($p['status']); ?></td>
            <?php foreach( $date_eblek as $v ): ?>
            <?php 
                $pr = isset($data_presensi[$id][dateSQL($v['dt'])]) ? $data_presensi[$id][dateSQL($v['dt'])] : array();

                $totalPlan = isset($row_eblek['detail']['plan'][$id][$v['dt']]) ? $row_eblek['detail']['plan'][$id][$v['dt']] : config('produksi.qty_plan');
                $totalActual = isset($row_eblek['detail']['actual'][$id][$v['dt']]) ? $row_eblek['detail']['actual'][$id][$v['dt']] : 0;
                
                if ( $pr && $pr['keterangan']!='H' )
                {
                    $totalPlan = $totalActual = 0;
                }
                
                if ( isset($total['plan'][$v['dt']]) )
                    $total['plan'][$v['dt']] += $totalPlan;
                else
                    $total['plan'][$v['dt']] = $totalPlan;

                if ( isset($total['actual'][$v['dt']]) )
                    $total['actual'][$v['dt']] += $totalActual;
                else
                    $total['actual'][$v['dt']] = $totalActual;

                $disable = !$pr ? 'disabled="disabled"' : '';
                
                //total Presensi
                foreach( config('presensi.keterangan') as $kPrs=> $vPrs)
                {
                    if ( isset($pr['keterangan']) && $pr['keterangan']==$kPrs )
                    {
                        if (  isset($totalPresensi[$v['dt']][$p['status']][$kPrs])  )
                            $totalPresensi[$v['dt']][$p['status']][$kPrs]++;
                        else
                            $totalPresensi[$v['dt']][$p['status']][$kPrs]=1;
                    } 
                }
            ?>
            <?php if ( $disable ) { ?>
            <td style="padding: 0;" colspan="3"><input type="text" class="form-control" name="produk_plan[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['plan'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['plan'][$id][$v['dt']]) : formatNumber(config('produksi.qty_plan'))); ?>" /></td>
            <td style="padding: 0;" colspan="3"><input type="text" <?=$disable?> class="form-control" name="produk_actual[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['actual'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['actual'][$id][$v['dt']]) : ''); ?>" /></td>
            <?php } elseif ( $pr['keterangan']=='H' ) { ?>
            <td style="padding: 0;" colspan="3"><input type="text" class="form-control tNum" name="produk_plan[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['plan'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['plan'][$id][$v['dt']]) : formatNumber(config('produksi.qty_plan'))); ?>" /></td>
            <td style="padding: 0;" colspan="3"><input type="text" class="form-control tNum product_actual <?= isset($pr['lembur']) && $pr['lembur']>0 ? 'bgGreen-'.intval($pr['lembur']) : '' ?>" <?= isset($pr['lembur']) && $pr['lembur']>0 ? 'data-toggle="modal" data-target=".modal-lembur-'.$id.'-'.$v['dt'].'"' : ''?> name="produk_actual[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['actual'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['actual'][$id][$v['dt']]) : ''); ?>" />
            <?php if ( isset($pr['lembur']) && $pr['lembur']>0 ) { ?>
                <div class="modal fade modal-lembur-<?= $id.'-'.$v['dt'] ?>" tabindex="-1" role="dialog" aria-labelledby="Modal Lembur" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-body modal-lembur">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('aktivitas/produksi.tanggal')); ?></label>
                                  <span class="form-control text-center" disabled="disabled" style="padding: 5px;"><?php echo e(formatDate($v['dt'])); ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('aktivitas/produksi.lembur')); ?></label>
                                  <span class="form-control text-center" disabled="disabled" style="padding: 5px;"><?= isset($pr['lembur']) && $pr['lembur']>0 ? $pr['lembur'].' '.trans('aktivitas/produksi.jam') : '' ?></span>
                                </div>
                            </div>
                          </div>  
                          <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/produksi.nama')); ?></label>
                              <span class="form-control" disabled="disabled"><?php echo e($p['nama']); ?> / <?php echo e($p['status']); ?></span>
                          </div> 
                          <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/produksi.tot_produksi')); ?></label>
                              <input type="text" class="form-control produk_jkn tNum" style="text-align: left;padding: 5px;" name="produk_jkn[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['produk_jkn'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['produk_jkn'][$id][$v['dt']]) : 0); ?>" />
                          </div> 
                          <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/produksi.tot_lembur_1')); ?></label>
                              <input type="text" class="form-control produk_jl1 tNum" style="text-align: left;padding: 5px;" name="produk_jl1[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['produk_jl1'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['produk_jl1'][$id][$v['dt']]) : 0); ?>" />
                          </div>
                          <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/produksi.tot_lembur_2')); ?></label>
                              <input type="text" class="form-control produk_jl2 tNum" style="text-align: left;padding: 5px;" name="produk_jl2[<?php echo e($id); ?>][<?php echo e($v['dt']); ?>]" value="<?php echo e(isset($row_eblek['detail']['produk_jl2'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['produk_jl2'][$id][$v['dt']]) : 0); ?>" <?= isset($pr['lembur']) && $pr['lembur']>=2 ? '' : 'readonly="readonly"' ?> />
                          </div>
                          <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/produksi.actual')); ?></label>
                              <span class="form-control tot_actual" disabled="disabled"><?php echo e(isset($row_eblek['detail']['actual'][$id][$v['dt']]) ? formatNumber($row_eblek['detail']['actual'][$id][$v['dt']]) : 0); ?></span>
                          </div>
                          <div class="form-group has-feedback">
                              <label></label>
                              <button type="button" data-dismiss="modal" class="btn-close btn btn-primary btn-block no-radius"><?php echo e(trans('global.apply')); ?></button>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>
            </td>
            <?php } else { ?>
            <td class="text-center keterangan_<?= $pr['keterangan'] ?>" colspan="6"><small><?= $pr['keterangan'] ?></small></td>
            <?php } ?>
            <?php endforeach; ?>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <!-- Total -->
        <tr style="font-size: 12px;">
            <th class="text-center bg-blue" colspan="3"><?php echo e(trans('aktivitas/produksi.total')); ?></th>
            <?php foreach( $date_eblek as $v ): ?>
            <th style="text-align: center;" colspan="3"><?php echo e(formatNumber($total['plan'][$v['dt']])); ?></th>
            <th style="text-align: center;" colspan="3"><?php echo e(formatNumber($total['actual'][$v['dt']])); ?></th>
            <?php endforeach; ?>
        </tr>
        <!-- presensi head -->
        <tr>
            <td class="text-center" colspan="3"></td>
            <?php foreach( $date_eblek as $v ): ?>
                <?php foreach( config('app.status') as $kS=>$vS ): ?>
                <td style="text-align: center;" title="<?php echo e($vS); ?>"><?php echo e($kS); ?></td>
                <?php endforeach; ?>
                <td style="text-align: center;" class="bg-blue" title="<?php echo e(trans('aktivitas/produksi.total')); ?>"><?php echo e(trans('aktivitas/produksi.tot')); ?></td>
            <?php endforeach; ?>
        </tr>
        <!-- presensi keterangan -->
        <?php foreach( config('presensi.keterangan') as $kP=>$vP ): ?>
        <tr>
            <td class="text-center" colspan="3"><?php echo e(strtoupper($vP)); ?></td>
            <?php foreach( $date_eblek as $v ): ?>
                <?php $tot = 0; ?>
                <?php foreach( config('app.status') as $kS=>$vS ): ?>
                <?php $tot+= isset($totalPresensi[$v['dt']][$kS][$kP]) ? $totalPresensi[$v['dt']][$kS][$kP] : 0; ?>
                <td style="text-align: center;" title="<?php echo e($vS); ?>"><?= isset($totalPresensi[$v['dt']][$kS][$kP]) ? $totalPresensi[$v['dt']][$kS][$kP] : '' ?></td>
                <?php endforeach; ?>
                <td style="text-align: center;" class="bg-blue" title="<?php echo e(trans('aktivitas/produksi.total')); ?>"><?php echo e(formatNumber($tot)); ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
        <tr><td colspan="3" style="border: none; text-align: center;">&nbsp;</td></tr>
        <tr><td colspan="3" style="border: none; text-align: center; font-size: 14px;">MANDOR KELOMPOK</td></tr>
        <tr><td colspan="3" style="border: none; text-align: center;">&nbsp;</td></tr>
        <tr><td colspan="3" style="border: none; text-align: center;">&nbsp;</td></tr>
        <tr><td colspan="3" style="border: none; text-align: center; font-size: 14px"><?= isset($row_eblek['mandor']) ? $row_eblek['mandor'] : Session::get('ses_emp_name') ?></td></tr>
    </tfoot>
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
</table>