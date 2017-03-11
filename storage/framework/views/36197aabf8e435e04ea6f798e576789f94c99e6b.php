<div class="text-center">
    <!--div class="btn-group"-->
      <button type="button" class="btn btn-default btn-flat btn-xs" title="<?php echo e(trans('aktivitas/penggajian.btn_gaji')); ?>" data-toggle="modal" data-target="#modalGaji-<?php echo e($id); ?>"> <i class="fa fa-money"></i> Slip Gaji</button>
    <!--/div-->
</div>

<!-- Modal -->
<div class="modal fade modalGaji" id="modalGaji-<?php echo e($id); ?>" tabindex="-1" role="dialog" aria-labelledby="modalGaji-<?php echo e($id); ?>-Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content box">
      <form method="POST" action="<?php echo e(url('penggajian/save')); ?>" class="form-gaji form-bulanan" data-type="bln">  
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-center" id="modalGaji-<?php echo e($id); ?>-Label"><?php echo trans('aktivitas/penggajian.btn_gaji'); ?></h4>
      </div>
      <div class="modal-body tb-slip">
        <?php
            $date = $filter['_year'].'-'.$filter['_month'].'-01';
            $gapok = isset($rowGaji->atribut['jkn']) ? isset($rowGaji->atribut['jkn']) : $bagian['jkn'];  
            $subtotal = $gapok;
            
            $jam_jl1 = isset($rowGaji->bulanan['jl1']) ? $rowGaji->bulanan['jl1'] : (isset($lembur['jl1'])?($lembur['total']['jl1']):0);
            $jam_jl2 = isset($rowGaji->bulanan['jl2']) ? $rowGaji->bulanan['jl2'] : (isset($lembur['jl2'])?($lembur['total']['jl2']):0);
            $jam_jl3 = isset($rowGaji->bulanan['jl3']) ? $rowGaji->bulanan['jl3'] : (isset($lembur['jl3'])?($lembur['total']['jl3']):0);
            $jam_jl4 = isset($rowGaji->bulanan['jl4']) ? $rowGaji->bulanan['jl4'] : (isset($lembur['jl4'])?($lembur['total']['jl4']):0);
            $jl1 = isset($rowGaji->atribut['jl1']) ? $rowGaji->atribut['jl1'] : $bagian['jl1'];
            $jl2 = isset($rowGaji->atribut['jl2']) ? $rowGaji->atribut['jl2'] : $bagian['jl2'];
            $jl3 = isset($rowGaji->atribut['jl3']) ? $rowGaji->atribut['jl3'] : $bagian['jl3'];
            $jl4 = isset($rowGaji->atribut['jl4']) ? $rowGaji->atribut['jl4'] : $bagian['jl4'];
            $subjl1 = $jam_jl1 * $jl1;
            $subjl2 = $jam_jl2 * $jl2;
            $subjl3 = $jam_jl3 * $jl3;
            $subjl4 = $jam_jl4 * $jl4;
            $subtotal+=$subjl1;
            $subtotal+=$subjl2;
            $subtotal+=$subjl3;
            $subtotal+=$subjl4;
        ?>
        <table class="table table-condensed ">
            <tr> <td class="key">Bulan</td> <td class="sep">:</td> <td class="val text-left"><?php echo e(formatDate($date, 4)); ?></td> </tr>
            <tr> <td class="key">Nama</td> <td class="sep">:</td> <td class="val text-left"><?php echo e($nama); ?></td> </tr>
            <tr> <td class="key">NIP</td> <td class="sep">:</td> <td class="val text-left"><?php echo e($NIP); ?> / <?php echo e(isset(config('app.status')[$status]) ? config('app.status')[$status] : ''); ?></td> </tr>
            <tr> <td class="key">Bag/Jabatan</td> <td class="sep">:</td> <td class="val text-left"><?php echo e($bagian['nama']); ?></td> </tr>
            <tr> <td class="key">Status</td> <td class="sep">:</td> <td class="val text-left"><?= isset($menikah) && $menikah==1 ? '<span title="Kawin">K</span>' : '<span title="Belum Kawin">BK</span>' ?> <?= count($anak)>0 ? '<span title="Jumlah Anak">-'.count($anak).'</span>' : '' ?> </td> </tr>
            <tr> <td colspan="3">&nbsp;</td> </tr>
            <tr> <td class="key">GP</td> <td class="sep">:</td> <td class="val text-right total-gapok" data-gapok="<?php echo e($gapok); ?>"><?php echo e(formatNumber($gapok, 0, true)); ?></td> </tr>
            <tr> <td class="key">JL.1</td> <td class="sep">:</td> <td class="val text-right lbl-lbr-1"><?php echo e(formatNumber($subjl1, 0, true)); ?></td> </tr>
            <tr> <td class="key">JL.2</td> <td class="sep">:</td> <td class="val text-right lbl-lbr-2"><?php echo e(formatNumber($subjl2, 0, true)); ?></td> </tr>
            <tr> <td class="key">JL.3</td> <td class="sep">:</td> <td class="val text-right lbl-lbr-3"><?php echo e(formatNumber($subjl3, 0, true)); ?></td> </tr>
            <tr> <td class="key">JL.4</td> <td class="sep">:</td> <td class="val text-right lbl-lbr-4 border-bottom"><?php echo e(formatNumber($subjl4, 0, true)); ?></td> </tr>
            <tr> <td class="text-right">Jumlah</td> <td class="sep">:</td> <td class="val text-right subtotal-1"><?php echo e(formatNumber($subtotal, 0, true)); ?></td> </tr>
            <tr> <td class="text-left">Potongan</td> <td></td> <td></td> </tr>
            <tr> <td class="key">BPJS JHT <small>(<?php echo e(config('produksi.pot_bpjs_jht')); ?>%)</small></td> <td class="sep">:</td> <td class="val text-right">
                <?php $pot_bpjs_jht = isset($rowGaji->atribut['pot_bpjs_jht']) ? $rowGaji->atribut['pot_bpjs_jht'] : ($gapok*config('produksi.pot_bpjs_jht')/100); $subtotal-=$pot_bpjs_jht; ?>
                <?php if( isset($rowGaji) && $rowGaji->status=='selesai' ): ?>
                    <?php echo e(formatNumber($pot_bpjs_jht, 0, true)); ?>

                <?php else: ?>
                    <input type="text" maxlength="9" value="<?php echo e(formatNumber($pot_bpjs_jht)); ?>" class="form-control slip-input tNum input-min" name="atribut[pot_bpjs_jht]" />
                <?php endif; ?>
            </td> </tr>
            <tr> <td class="key">BPJS KES <small>(<?php echo e(config('produksi.pot_bpjs_kes')); ?>%)</small></td> <td class="sep">:</td> <td class="val text-right">
                <?php $pot_bpjs_kes = isset($rowGaji->atribut['pot_bpjs_kes']) ? $rowGaji->atribut['pot_bpjs_kes'] : ($gapok*config('produksi.pot_bpjs_kes')/100); $subtotal-=$pot_bpjs_kes; ?>
                <?php if( isset($rowGaji) && $rowGaji->status=='selesai' ): ?>
                    <?php echo e(formatNumber($pot_bpjs_kes, 0, true)); ?>

                <?php else: ?>
                    <input type="text" maxlength="9" value="<?php echo e(formatNumber($pot_bpjs_kes)); ?>" class="form-control slip-input tNum input-min" name="atribut[pot_bpjs_kes]" />
                <?php endif; ?>
            </td> </tr>
            <tr> <td class="key">Pensiun <small>(<?php echo e(config('produksi.pot_bpjs_pns')); ?>%)</small></td> <td class="sep">:</td> <td class="val text-right border-bottom">
                <?php $pot_bpjs_pns = isset($rowGaji->atribut['pot_bpjs_pns']) ? $rowGaji->atribut['pot_bpjs_pns'] : ($gapok*config('produksi.pot_bpjs_pns')/100); $subtotal-=$pot_bpjs_pns; ?>
                <?php if( isset($rowGaji) && $rowGaji->status=='selesai' ): ?>
                    <?php echo e(formatNumber($pot_bpjs_pns, 0, true)); ?>

                <?php else: ?>
                    <input type="text" maxlength="9" value="<?php echo e(formatNumber($pot_bpjs_pns)); ?>" class="form-control slip-input tNum input-min" name="atribut[pot_bpjs_pns]" />
                <?php endif; ?>
            </td> </tr>
            <tr> <td class="text-right">Jumlah BPJS</td> <td class="sep">:</td> <td class="val text-right total-potongan"><?php echo e(formatNumber(($pot_bpjs_jht+$pot_bpjs_kes+$pot_bpjs_pns), 0, true)); ?></td> </tr>
            <tr> <td class="key">Total Upah</td> <td class="sep">:</td> <td class="val text-right subtotal-2"><?php echo e(formatNumber($subtotal, 0, true)); ?></td> </tr>
        </table>
        <div class="row">
            <div class="col-md-5">
                <div class="signature text-center">
                    <?php echo e(config('app.signature')); ?>, <?php echo e(formatDate(( isset($rowGaji->tanggal) ? $rowGaji->tanggal : date("Y-m-d") ))); ?>

                    <br /><br /><br /><br />
                    <?php echo e(ucwords((isset($rowGaji)?$rowGaji->dataPetugas->pegawai->nama:session::get('ses_emp_name')))); ?>

                    <input type="hidden" name="petugas" value="<?php echo e(isset($rowGaji->petugas) ? $rowGaji->petugas : session::get('ses_userid')); ?>" />
                </div>
            </div>
            <div class="col-md-7">
                <table class="table table-condensed">
                    <thead>
                        <th>Lembur</th> <th>Jam</th> <th>@(Rp)</th>
                    </thead>
                    <tbody>
                        <tr> <td>JL.1</td> <td style="width: 100px;">
                            <input readonly="1" type="text" maxlength="6" data-target=".lbl-lbr-1" value="<?php echo e(formatNumber($jam_jl1,2)); ?>" class="form-control input-jam-lembur slip-input tDec" name="bulanan[jl1]" />
                        </td> <td>
                            <?php echo e(formatNumber($bagian['jl1'])); ?>

                            <input type="hidden" maxlength="6" value="<?php echo e(($jl1)); ?>" class="form-control slip-input tNum input-value-lembur" name="atribut[jl1]" />
                        </td> </tr>

                        <tr> <td>JL.2</td> <td style="width: 100px;">
                            <input readonly="1" type="text" maxlength="6" data-target=".lbl-lbr-2" value="<?php echo e(formatNumber($jam_jl2,2)); ?>" class="form-control input-jam-lembur slip-input tDec" name="bulanan[jl2]" />
                        </td> <td>
                            <?php echo e(formatNumber($bagian['jl2'])); ?>

                            <input type="hidden" maxlength="6" value="<?php echo e(($jl2)); ?>" class="form-control slip-input tNum input-value-lembur" name="atribut[jl2]" />
                        </td> </tr>

                        <tr> <td>JL.3</td> <td style="width: 100px;">
                            <input readonly="1" type="text" maxlength="6" data-target=".lbl-lbr-3" value="<?php echo e(formatNumber($jam_jl3,2)); ?>" class="form-control input-jam-lembur slip-input tDec" name="bulanan[jl3]" />
                        </td> <td>
                            <?php echo e(formatNumber($bagian['jl3'])); ?>

                            <input type="hidden" maxlength="6" value="<?php echo e(($jl3)); ?>" class="form-control slip-input tNum input-value-lembur" name="atribut[jl3]" />
                        </td> </tr>

                        <tr> <td>JL.4</td> <td style="width: 100px;">
                            <input readonly="1" type="text" maxlength="6" data-target=".lbl-lbr-4" value="<?php echo e(formatNumber($jam_jl4,2)); ?>" class="form-control input-jam-lembur slip-input tDec" name="bulanan[jl4]" />
                        </td> <td>
                            <?php echo e(formatNumber($bagian['jl4'])); ?>

                            <input type="hidden" maxlength="6" value="<?php echo e(($jl4)); ?>" class="form-control slip-input tNum input-value-lembur" name="atribut[jl4]" />
                        </td> </tr>

                    </tbody>
                </table>                
            </div>
        </div>
        <div class="text-lembur">
            <?php if( isset($lembur['jl1']) && count($lembur['jl1'])>0 ): ?>
                <br/>Lembur (1) : <?php echo implode(', ',array_keys($lembur['jl1'])); ?>

            <?php endif; ?>
            <?php if( isset($lembur['jl2']) &&  count($lembur['jl2'])>0 ): ?>
                <br/>Lembur (2) : <?php echo implode(', ',array_keys($lembur['jl2'])); ?>

            <?php endif; ?>
            <?php if( isset($lembur['jl3']) &&  count($lembur['jl3'])>0 ): ?>
                <br/>Lembur (3) : <?php echo implode(', ',array_keys($lembur['jl3'])); ?>

            <?php endif; ?>
            <?php if( isset($lembur['jl4']) &&  count($lembur['jl4'])>0 ): ?>
                <br/>Lembur (4) : <?php echo implode(', ',array_keys($lembur['jl4'])); ?>

            <?php endif; ?>
        </div>
      <input type="hidden" name="total" value="<?php echo e($subtotal); ?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><?php echo e(trans('global.act_close')); ?></button>
        
        <?php if( isset($rowGaji) && $rowGaji->status=='selesai' ): ?>
          <a target="_blank" href="<?php echo e(url('penggajian/print/'.$rowGaji->id)); ?>" class="btn btn-primary btn-flat btn-print"> <i class="fa fa-print"></i> <?php echo e(trans('global.print')); ?></a>
        <?php else: ?>
          <a href="#" class="btn btn-primary btn-flat btn-save"><?php echo e(trans('global.save')); ?></a>  
        <?php endif; ?>
        <?php if( isset($rowGaji) && $rowGaji->id && $rowGaji->status!='selesai' ): ?>
            <a href="<?php echo e(url('penggajian/reset/'.$rowGaji->id)); ?>" class="btn btn-primary btn-flat btn-warning btn-reset"><?php echo e(trans('global.reset')); ?></a>
        <?php endif; ?>
      </div>
      
      <div class="overlay delete-loding" style="display: none;">
          <i class="fa fa-refresh fa-spin"></i>
      </div>
      <input type="hidden" name="type" value="bln" />
      <input type="hidden" name="tanggal" value="<?php echo e($date); ?>" />
      <input type="hidden" name="minggu" value="<?php echo e(date('W', strtotime($date))); ?>" />
      <input type="hidden" name="id_pegawai" value="<?php echo e($id); ?>" />
      <input type="hidden" name="status" value="<?php echo e(isset($rowGaji) && $rowGaji ? ($rowGaji->status=='review'?'revisi':$rowGaji->status) : 'baru'); ?>" />
      <input type="hidden" name="_penggajian_id" value="<?php echo e(isset($rowGaji) && $rowGaji ? $rowGaji->id : ''); ?>" />
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
      </form>
    </div>
  </div>
</div>

<style>
td.key{
    /*width: 100px;*/
    white-space: nowrap;
}
td.sep{
    width: 10px;
    text-align: center;
    white-space: nowrap;
}
td.val{
    width: 200px;
    white-space: nowrap;
}
.text-lembur {
    font-size: 11px;
}
</style>
<?php if( $print ): ?>
<style>
body {
    width: 350px;
    
}
.form-gaji {
    border: 3px double;
    padding: 15px;
}
.close {
    display: none;
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
input {
    border: none;
    background: none;
}
button, .btn-print {
    display: none;
}
.input-jam-lembur {
    text-align: center;
}
a {
    color: #000;
    text-decoration: none;
}
</style>
<script>
    window.print();
</script>
<?php endif; ?>