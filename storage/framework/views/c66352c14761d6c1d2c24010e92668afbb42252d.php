<form method="POST" action="<?php echo e(url('laporan-penggajian/save')); ?>" class="form-gaji" data-type="brg">
    <?php if( !$print ): ?>
    <div class="text-center">
        <!--div class="btn-group"-->
          <button type="button" class="btn btn-default btn-flat btn-xs" data-toggle="modal" data-target="#modalGaji-<?php echo e($id); ?>"> <i class="fa fa-money"></i> Slip Gaji</button>
          <?php if( isset($rowGaji) && $rowGaji->status=='selesai' ): ?>
            <a href="<?php echo e(url('laporan-penggajian/print/'.$rowGaji->id)); ?>" target="_blank" class="btn btn-primary btn-xs btn-flat btn-print"> <i class="fa fa-print"></i> <?php echo e(trans('global.print')); ?></a>
          <?php else: ?>
            <a href="#" class="btn btn-success btn-flat btn-save selesai btn-xs" data-action="selesai"> <i class="fa fa-check"></i> <?php echo e(trans('laporan/penggajian.setuju')); ?></a>
         <?php endif; ?>
          <a href="#" class="btn btn-danger btn-flat btn-save review btn-xs" data-action="review"> <i class="fa fa-remove"></i> <?php echo e(trans('laporan/penggajian.tolak')); ?></a>
        <!--/div-->
    </div>
    <?php endif; ?>    
    
    <!-- Modal -->
    <div class="modal fade modalGaji" id="modalGaji-<?php echo e($id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalGaji-<?php echo e($id); ?>-Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content box">
          <div class="modal-header">
            <?php if( !$print ): ?><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><?php endif; ?>
            <h4 class="modal-title text-center" id="modalGaji-<?php echo e($id); ?>-Label"><?php echo trans('aktivitas/penggajian.btn_gaji'); ?></h4>
          </div>
          <div class="modal-body">
            <table class="table">
                <tr>
                    <th class="slip-k">Period</th> <td><?php echo e(getDayPayment($filter['_year'], $filter['_month'], 'period', '-')[$filter['_period']]); ?></td> <td class="slip-k">Week : <?php echo e($filter['_period']); ?></td>
                </tr>
                <tr>
                    <th class="slip-k">Nama</th> <td colspan="2"><?php echo e($nama); ?></td>
                </tr>
                <tr>
                    <th class="slip-k">NIK</th> <td colspan="2"><?php echo e($NIP); ?> / <?php echo e(isset(config('app.status')[$status]) ? config('app.status')[$status] : ''); ?></td>
                </tr>
                <tr>
                    <th class="slip-k">Bagian</th> <td colspan="2"><?php echo e($bagian['nama']); ?> / <?php echo e($golongan); ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table class="table table-striped table-hover table-condensed tb-slip">
                            <?php $subtotal = 0; ?>
                            <tr>
                                <td></td>
                                <td colspan="2">JKN : <?php echo e(formatNumber( (isset($rowGaji->atribut['jkn']) ? $rowGaji->atribut['jkn'] : $bagian['jkn']), 3)); ?></td> 
                                <td colspan="2">JL1 : <?php echo e(formatNumber( (isset($rowGaji->atribut['jl1']) ? $rowGaji->atribut['jl1'] : $bagian['jl1']), 3)); ?></td> 
                                <td colspan="2">JL2 : <?php echo e(formatNumber( (isset($rowGaji->atribut['jl2']) ? $rowGaji->atribut['jl2'] : $bagian['jl2']), 3)); ?></td>
                                <td></td>
                                <input type="hidden" name="atribut[ums]" value="<?php echo e((isset($rowGaji->atribut['ums']) ? $rowGaji->atribut['ums'] : config('produksi.ums'))); ?>" /> 
                                <input type="hidden" name="atribut[jkn]" value="<?php echo e((isset($rowGaji->atribut['jkn']) ? $rowGaji->atribut['jkn'] : $bagian['jkn'])); ?>" /> 
                                <input type="hidden" name="atribut[jl1]" value="<?php echo e((isset($rowGaji->atribut['jl1']) ? $rowGaji->atribut['jl1'] : $bagian['jl1'])); ?>" /> 
                                <input type="hidden" name="atribut[jl2]" value="<?php echo e((isset($rowGaji->atribut['jl2']) ? $rowGaji->atribut['jl2'] : $bagian['jl2'])); ?>" />
                            </tr>
                            <?php foreach( getDayPayment($filter['_year'], $filter['_month'], 'period', null, true)[$filter['_period']] as $date): ?>
                            <tr>
                                <td title="<?php echo e($date); ?>"><?php echo e(dateToDay($date)); ?></td> 
                                <?php if( isset($rowGaji->borongan[$date]) ): ?>
                                <td class="text-right" title="<?php echo e($rowGaji->borongan[$date]['jkn'] .' * '.formatNumber($rowGaji->atribut['jkn'],3).' = '.formatNumber(($rowGaji->borongan[$date]['jkn']*$rowGaji->atribut['jkn']), 0, true)); ?>"><?php echo e($rowGaji->borongan[$date]['jkn']); ?></td> <td class="text-left">btg + </td>
                                <td class="text-right" title="<?php echo e($rowGaji->borongan[$date]['jl1'] .' * '.formatNumber($rowGaji->atribut['jl1'],3).' = '.formatNumber(($rowGaji->borongan[$date]['jl1']*$rowGaji->atribut['jl1']), 0, true)); ?>"><?php echo e($rowGaji->borongan[$date]['jl1']); ?></td> <td class="text-left">btg + </td> 
                                <td class="text-right" title="<?php echo e($rowGaji->borongan[$date]['jl2'] .' * '.formatNumber($rowGaji->atribut['jl2'],3).' = '.formatNumber(($rowGaji->borongan[$date]['jl2']*$rowGaji->atribut['jl2']), 0, true)); ?>"><?php echo e($rowGaji->borongan[$date]['jl2']); ?></td> <td class="text-left">btg = </td>
                                <td class="text-right">
                                    <?php
                                        $total = $rowGaji->borongan[$date]['jkn']*$rowGaji->atribut['jkn']+
                                                 $rowGaji->borongan[$date]['jl1']*$rowGaji->atribut['jl1']+
                                                 $rowGaji->borongan[$date]['jl2']*$rowGaji->atribut['jl2'];
                                        $subtotal+= $total;
                                    ?>
                                    <?php echo e(formatNumber($total, 0, true)); ?>

                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][jkn]" value="<?php echo e($rowGaji->borongan[$date]['jkn']); ?>" />
                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][jl1]" value="<?php echo e($rowGaji->borongan[$date]['jl1']); ?>" />
                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][jl2]" value="<?php echo e($rowGaji->borongan[$date]['jl2']); ?>" />
                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][subtotal]" value="<?php echo e($total); ?>" />
                                </td>
                                <?php else: ?>
                                <td class="text-right" title="<?php echo e(slipHargaProduksi($produksi, $date, 'jkn', false) .' * '.formatNumber($bagian['jkn'],3).' = '.formatNumber(slipHargaProduksi($produksi, $date, 'jkn', false)*$bagian['jkn'], 0, true)); ?>"><?php echo e(slipHargaProduksi($produksi, $date, 'jkn')); ?></td> <td class="text-left">btg + </td> 
                                <td class="text-right" title="<?php echo e(slipHargaProduksi($produksi, $date, 'jl1', false) .' * '.formatNumber($bagian['jl1'],3).' = '.formatNumber(slipHargaProduksi($produksi, $date, 'jl1', false)*$bagian['jl1'], 0, true)); ?>"><?php echo e(slipHargaProduksi($produksi, $date, 'jl1')); ?></td> <td class="text-left">btg + </td> 
                                <td class="text-right" title="<?php echo e(slipHargaProduksi($produksi, $date, 'jl2', false) .' * '.formatNumber($bagian['jl2'],3).' = '.formatNumber(slipHargaProduksi($produksi, $date, 'jl2', false)*$bagian['jl2'], 0, true)); ?>"><?php echo e(slipHargaProduksi($produksi, $date, 'jl2')); ?></td> <td class="text-left">btg = </td>
                                <td class="text-right">
                                    <?php
                                        $total = slipHargaProduksi($produksi, $date, 'jkn', false)*$bagian['jkn']+
                                                 slipHargaProduksi($produksi, $date, 'jl1', false)*$bagian['jl1']+
                                                 slipHargaProduksi($produksi, $date, 'jl2', false)*$bagian['jl2'];
                                        $subtotal+= $total;
                                    ?>
                                    <?php echo e(formatNumber($total, 0, true)); ?>

                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][jkn]" value="<?php echo e(slipHargaProduksi($produksi, $date, 'jkn', false)); ?>" />
                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][jl1]" value="<?php echo e(slipHargaProduksi($produksi, $date, 'jl1', false)); ?>" />
                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][jl2]" value="<?php echo e(slipHargaProduksi($produksi, $date, 'jl2', false)); ?>" />
                                    <input type="hidden" name="breakdown[<?php echo e($date); ?>][subtotal]" value="<?php echo e($total); ?>" />
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border">
                                    <?php echo e(trans('aktivitas/penggajian.subtotal')); ?> I
                                </td>
                                <td class="border-top">
                                    <?php echo e(formatNumber($subtotal, 0, true)); ?>

                                    <input type="hidden" value="<?php echo e($subtotal); ?>" name="subtotal1"/>
                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border">
                                    <?php echo e(trans('aktivitas/penggajian.cuti_minggu')); ?>

                                </td>
                                <td class="no-border">
                                    <?php $cuti_minggu = (isset($rowGaji) && isset($rowGaji->atribut['cuti_minggu']) ? $rowGaji->atribut['cuti_minggu'] : config('produksi.ums')/30); $subtotal+=$cuti_minggu; ?>
                                    <?php echo e(formatNumber($cuti_minggu, 0, true)); ?>

                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border">
                                    <?php echo e(trans('aktivitas/penggajian.cuti_haid')); ?>

                                </td>
                                <td class="no-border">
                                    <?php $cuti_haid = isset($rowGaji) && isset($rowGaji->atribut['cuti_haid']) ? $rowGaji->atribut['cuti_haid'] : 0; $subtotal+=$cuti_haid; ?>
                                    <?php echo e(formatNumber($cuti_haid, 0, true)); ?>

                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border">
                                    <?php echo e(trans('aktivitas/penggajian.cuti_nasional')); ?>

                                </td>
                                <td class="no-border">
                                    <?php $cuti_nasional = isset($rowGaji) && isset($rowGaji->atribut['cuti_nasional']) ? $rowGaji->atribut['cuti_nasional'] : 0; $subtotal+=$cuti_nasional; ?>
                                    <?php echo e(formatNumber($cuti_nasional, 0, true)); ?>

                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border">
                                    <?php echo e(trans('aktivitas/penggajian.subtotal')); ?> II
                                    <input type="hidden" value="<?=$subtotal?>" name="subtotal2" />
                                </td>
                                <td class="border-top subtotal2">
                                    <?=formatNumber($subtotal, 0, true)?>
                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border" title="<?php echo e(config('app.pot_bpjs_jht')); ?>%">
                                    <?php echo e(trans('aktivitas/penggajian.pot_bpjs_jht')); ?>

                                </td>
                                <td class="no-border">
                                    <?php $pot_bpjs_jht = isset($rowGaji->atribut['pot_bpjs_jht']) ? $rowGaji->atribut['pot_bpjs_jht'] : (config('produksi.ums')/config('produksi.pot_bpjs_jht')/100); $subtotal-=$pot_bpjs_jht; ?>
                                    <?php echo e(formatNumber($pot_bpjs_jht, 0, true)); ?>

                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border"  title="<?php echo e(config('app.pot_bpjs_pns')); ?>%">
                                    <?php echo e(trans('aktivitas/penggajian.pot_bpjs_pns')); ?>

                                </td>
                                <td class="no-border">
                                    <?php $pot_bpjs_pns = isset($rowGaji->atribut['pot_bpjs_pns']) ? $rowGaji->atribut['pot_bpjs_pns'] : (config('produksi.ums')/config('produksi.pot_bpjs_pns')/100); $subtotal-=$pot_bpjs_pns; ?>
                                    <?php echo e(formatNumber($pot_bpjs_pns, 0, true)); ?>

                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border" title="<?php echo e(config('app.pot_bpjs_kes')); ?>%">
                                    <?php echo e(trans('aktivitas/penggajian.pot_bpjs_kes')); ?>

                                </td>
                                <td class="no-border">
                                    <?php $pot_bpjs_kes = isset($rowGaji->atribut['pot_bpjs_kes']) ? $rowGaji->atribut['pot_bpjs_kes'] : (config('produksi.ums')/config('produksi.pot_bpjs_kes')/100); $subtotal-=$pot_bpjs_kes; ?>
                                    <?php echo e(formatNumber($pot_bpjs_kes, 0, true)); ?>

                                </td>
                            </tr>
                            <tr class="text-right no-bg">
                                <td colspan="7" class="no-border">
                                    <?php echo e(trans('aktivitas/penggajian.total')); ?>

                                    <input type="hidden" value="<?=$subtotal?>" name="total" />
                                </td>
                                <td class="border-top total">
                                    <?=formatNumber($subtotal, 0, true)?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="no-bg no-border">
                                    <div class="signature text-center">
                                        <?php echo e(config('app.signature')); ?>, <?php echo e(formatDate(( isset($rowGaji->tanggal) ? $rowGaji->tanggal : $date ))); ?>

                                        <br /><br /><br /><br />
                                        <?php echo e(ucwords((isset($rowGaji)?$rowGaji->dataPetugas->pegawai->nama:session::get('ses_emp_name')))); ?>

                                        <input type="hidden" name="petugas" value="<?php echo e(isset($rowGaji->petugas) ? $rowGaji->petugas : session::get('ses_userid')); ?>" />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>        
          </div>
          <?php if( !$print ): ?>          
          <div class="modal-footer">
            <button type="button" class="btn btn-close btn-default btn-flat" data-dismiss="modal"><?php echo e(trans('global.act_close')); ?></button>
            <?php if( isset($rowGaji) && $rowGaji->status=='selesai' ): ?>
            <a href="<?php echo e(url('laporan-penggajian/print/'.$rowGaji->id)); ?>" target="_blank" class="btn btn-primary btn-flat btn-print"> <i class="fa fa-print"></i> <?php echo e(trans('global.print')); ?></a>
            <?php else: ?>
            <a href="#" class="btn btn-success btn-flat btn-save selesai" data-action="selesai"> <i class="fa fa-check"></i> <?php echo e(trans('laporan/penggajian.setuju')); ?></a>
            <?php endif; ?>
            <a href="#" class="btn btn-danger btn-flat btn-save review" data-action="review"> <i class="fa fa-remove"></i> <?php echo e(trans('laporan/penggajian.tolak')); ?></a>
          </div>
          <?php endif; ?>          
          
          <div class="overlay" style="display: none;" >
              <i class="fa fa-refresh fa-spin"></i>
          </div>
          
          <input type="hidden" name="tanggal" value="<?php echo e($date); ?>" />
          <input type="hidden" name="minggu" value="<?php echo e($filter['_period']); ?>" />
          <input type="hidden" name="id_pegawai" value="<?php echo e($id); ?>" />
          <input type="hidden" name="status" value="<?php echo e(isset($rowGaji) && $rowGaji ? $rowGaji->status : 'baru'); ?>" />
          <input type="hidden" name="_penggajian_id" value="<?php echo e(isset($rowGaji) && $rowGaji ? $rowGaji->id : ''); ?>" />
          <input type="hidden" name="_action" value="" />
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        </div>
      </div>
    </div>
</form>
<?php if( $print ): ?>
<style>
body {
    width: 450px;
}
.form-gaji {
    border: 3px double;
}
td {
   width: 0px;
   white-space: nowrap; 
}
.modalGaji{
    font-size: 12px;
}
.table {
    width: 100%;
}
.text-left{
    text-align: left;
}
.text-center{
    text-align: center;
}
.text-right{
    text-align: right;
}
</style>
<script>
    window.print();
</script>
<?php endif; ?>