<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <?php echo e(val($dataForm, 'form_title')); ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <form method="POST" action="<?php echo e(BeUrl(config('pesanan.info.alias').'/save')); ?>">
                    
                    <div class="form-group has-feedback hide">
                        <input type="checkbox" name="status" <?php echo e(isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked'); ?> /> <?php echo e(trans('global.status_active')); ?>

                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">TANGGAL</th> <td><?php echo e(formatDate(val($dataForm, 'tanggal'), 5)); ?></td></tr>
                            <tr><th class="key">INVOICE</th> <th><?php echo e(val($dataForm, 'invoice')); ?></th></tr>
                            <tr><th class="key">TOTAL</th> <td><?php echo e(formatNumber(val($dataForm, 'subtotal'), 0, true)); ?></td></tr>
                            <tr><th class="key">STATUS</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="status_pesanan" class="form-control">
                                            <option value="PESANAN" <?php echo e(val($dataForm, 'status_pesanan')=='PESANAN' ? 'selected' : ''); ?> >PESANAN</option>
                                            <option value="DIBAYAR" <?php echo e(val($dataForm, 'status_pesanan')=='DIBAYAR' ? 'selected' : ''); ?> >DIBAYAR</option>
                                            <option value="DIKIRIM" <?php echo e(val($dataForm, 'status_pesanan')=='DIKIRIM' ? 'selected' : ''); ?> >DIKIRIM</option>
                                            <option value="TERKIRIM" <?php echo e(val($dataForm, 'status_pesanan')=='TERKIRIM' ? 'selected' : ''); ?> >TERKIRIM</option>
                                            <option value="BATAL" <?php echo e(val($dataForm, 'status_pesanan')=='BATAL' ? 'selected' : ''); ?> >BATAL</option>
                                        </select>
                                    </div>
                                </div>
                            </td></tr>
                            <tr><th class="key">METODE PEMBAYARAN</th> <td><?php echo e(strtoupper(val($dataForm, 'metode_pembayaran'))); ?></td></tr>
                            <tr><th class="key">ONGKOS KIRIM</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control tNum" name="ongkir" value="<?php echo e(formatNumber(val($dataForm, 'ongkir'))); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </td></tr>
                             <tr><th class="key">RESI</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="nomor_resi" value="<?php echo e(val($dataForm, 'nomor_resi')); ?>"/>
                                    </div>
                                </div>
                            </td></tr>
                            <?php if(val($dataForm, 'ongkir')): ?>
                             <tr><th class="key">TOTAL BAYAR</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon" disabled>Rp</span>
                                            <input type="text" class="form-control" disabled value="<?php echo e(formatNumber(val($dataForm, 'total'))); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </td></tr>
                            <?php endif; ?>
                        </thead>
                    </table>

                    <input type="hidden" name="id" value="<?php echo e(val($dataForm, 'id')); ?>" />
                    <input type="hidden" name="invoice" value="<?php echo e(val($dataForm, 'invoice')); ?>" />
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <button type="submit" class="btn btn-primary btn-flat"><?php echo e(val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add')); ?></button>
                    <a href="<?php echo e(BeUrl(config('pesanan.info.alias'))); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_back')); ?></a>
                  </form>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> DETAIL ITEM </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Sampul</th><th>JUDUL BUKU</th> <th>HARGA</th> <th>JUMLAH</th> <th>SUBTOTAL</th>
                    </thead>
                    <tbody>
                        <?php foreach( val($dataForm, 'detail') as $d ): ?>
                        <tr>
                            <td style="width: 50px;"><a href="<?php echo e(getBookUrl(val($d, 'item'))['detail']); ?>" target="_blank"><img src="<?php echo e(getBookImage(val($d, 'item.image'))['small']); ?>"/></a></td>
                            <td class="text-left"><?php echo e(val($d, 'item.title')); ?></td> 
                            <td class="text-right"><?php echo e(formatNumber(val($d, 'harga'), 0, true)); ?></td> 
                            <td class="text-center"><?php echo e(formatNumber(val($d, 'qty'))); ?></td> 
                            <td class="text-right"><?php echo e(formatNumber(val($d, 'subtotal'), 0, true)); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">TOTAL</td> <th class="text-right"><?php echo e(formatNumber(val($dataForm, 'subtotal'), 0, true)); ?></th>
                        </tr>
                    </tfoot>
                </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> DATA PEMBELI </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td><?php echo e(ucwords(val($dataForm, 'nama_pembeli'))); ?></td></tr>
                            <tr><th class="key">EMAIL</th> <td><?php echo e(strtolower(val($dataForm, 'email_pembeli'))); ?></td></tr>
                            <tr><th class="key">ALAMAT</th> <td><?php echo nl2br(val($dataForm, 'alamat_pembeli')); ?></td></tr>
                            <tr><th class="key">PROVINSI</th> <td><?php echo e(ucwords(val($dataForm, 'provinsi_pembeli'))); ?></td></tr>
                            <tr><th class="key">KOTA</th> <td><?php echo e(ucwords(val($dataForm, 'kota_pembeli'))); ?></td></tr>
                            <tr><th class="key">KODE POS</th> <td><?php echo e(val($dataForm, 'kodepos_pembeli')); ?></td></tr>
                            <tr><th class="key">TELEPON</th> <td><?php echo e(val($dataForm, 'telepon_pembeli')); ?></td></tr>
                        </thead>
                    </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> DATA PENERIMA </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td><?php echo e(ucwords(val($dataForm, 'nama_penerima'))); ?></td></tr>
                            <tr><th class="key">EMAIL</th> <td><?php echo e(strtolower(val($dataForm, 'email_penerima'))); ?></td></tr>
                            <tr><th class="key">ALAMAT</th> <td><?php echo nl2br(val($dataForm, 'alamat_penerima')); ?></td></tr>
                            <tr><th class="key">PROVINSI</th> <td><?php echo e(ucwords(val($dataForm, 'provinsi_penerima'))); ?></td></tr>
                            <tr><th class="key">KOTA</th> <td><?php echo e(ucwords(val($dataForm, 'kota_penerima'))); ?></td></tr>
                            <tr><th class="key">KODE POS</th> <td><?php echo e(val($dataForm, 'kodepos_penerima')); ?></td></tr>
                            <tr><th class="key">TELEPON</th> <td><?php echo e(val($dataForm, 'telepon_penerima')); ?></td></tr>
                        </thead>
                    </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> BUKTI PEMBAYARAN </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr><th class="key">TANGGAL</th> <td><?php echo e(formatDate(val($rowConfirm, 'tanggal'), 5)); ?></td></tr>
                        <tr><th class="key">TRANSFER KE AKUN</th> <td><?php echo e(val($rowConfirm, 'bank.nama_bank')); ?> <br/>
                                                                    <?php echo e(val($rowConfirm, 'bank.nama_akun')); ?><br/>
                                                                    <?php echo e(val($rowConfirm, 'bank.rekening')); ?>

                                                                    </td></tr>
                        <tr><th class="key">TRANSFER DARI</th> <td><?php echo e(val($rowConfirm, 'bank_dari')); ?> <br/>
                                                                    <?php echo e(val($rowConfirm, 'nama_pemilik')); ?>

                                                                    </td></tr>
                        <tr><th class="key">TOTAl TRANSFER</th> <td><?php echo e(formatNumber(val($rowConfirm, 'total'), 0, true)); ?></td></tr>
                        <tr><th class="key">LAMPIRAN</th> <td>
                        <?php if( val($rowConfirm, 'image') ): ?>
                            <img src="<?php echo e(asset('media/'.val($rowConfirm, 'image'))); ?>" style="max-width: 100%;"/>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                        </td></tr>
                    </thead>
                </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('style'); ?>
<style>
.key {
    width: 10px!important;
    white-space: nowrap;
    vertical-align: top!important;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){
    initNumber();
    $(document).on('submit', 'form', function(){
        stringToNumForm($(this));
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>