<div class="well">
    <h3>Terima kasih</h3>
    <strong>Invoice Anda : <?php echo e($row->invoice); ?></strong>
    <p>Anda menggunakan metode pembayaran transfer.<br/>
    Batas akhir pembayaran untuk metode transfer adalah <strong><?php echo e(formatDate(date("Y-m-d H:i:s", strtotime(config('app.expired_order'), strtotime($row->tanggal))), 5)); ?></strong>.</p>
    <p>Agar <?php echo e(config('app.title')); ?> dapat mengirimkan pesanan Anda, silakan lakukan dua tahap selanjutnya, yaitu</p>
    <ol>
        <li>Transfer total pembayaran ke salah satu rekening bank pembayaran <?php echo e(config('app.title')); ?></li>
        <li>Lakukan pengisian form konfirmasi pembayaran di situs <?php echo e(config('app.title')); ?>. Konfirmasi pembayaran ada dihalaman histori transaksi di <a href="<?php echo e(url('member/histori-transaksi')); ?>">sini</a> (login dulu sebelum masuk ke halaman histori transaksi)</li>
    </ol>
    <br/>
    <strong>Keterangan : </strong>
    <ul>
        <li>Pesanan Anda akan kami kirim setelah Anda menyelesaikan kedua tahap diatas.</li>
        <li class="red">Pesanan yang tidak disertai konfirmasi pembayaran, akan mengalami penundaan pengiriman</li>
    </ul>
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr><th class="key">TANGGAL</th> <td><?php echo e(formatDate($row->tanggal, 5)); ?></td></tr>
                    <tr><th class="key">INVOICE</th> <td><?php echo e($row->invoice); ?></td></tr>
                    <tr><th class="key">TOTAL</th> <td><?php echo e(formatNumber($row->subtotal, 0, true)); ?></td></tr>
                    <tr><th class="key">STATUS</th> <td><?php echo e($row->status_pesanan); ?></td></tr>
                    <tr><th class="key">METODE PEMBAYARAN</th> <td><?php echo e(strtoupper($row->metode_pembayaran)); ?></td></tr>
                    <?php if(val($row, 'ongkir')): ?>
                    <tr><th class="key">ONGKOS KIRIM</th> <td><?php echo e(formatNumber($row->ongkir, 0, true)); ?></td></tr>
                    <?php endif; ?>
                    <?php if(val($row, 'nomor_resi')): ?>
                    <tr><th class="key">NOMOR RESI</th> <td><?php echo e(val($row, 'nomor_resi', '-')); ?></td></tr>
                    <?php endif; ?>
                    <?php if(val($row, 'ongkir')): ?>
                    <tr><th class="key">TOTAL BAYAR</th> <td><?php echo e(formatNumber($row->total, 0, true)); ?></td></tr>
                    <?php endif; ?>
                </thead>
            </table>
            <br/>
            <h4>Detail</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Sampul</th><th>JUDUL BUKU</th> <th>HARGA</th> <th>JUMLAH</th> <th>SUBTOTAL</th>
                </thead>
                <tbody>
                    <?php foreach( $row->detail as $d ): ?>
                    <tr>
                        <td style="width: 50px;"><a href="<?php echo e(getBookUrl($d->item)['detail']); ?>" target="_blank"><img src="<?php echo e(getBookImage(val($d, 'item.image'))['small']); ?>"/></a></td>
                        <td class="text-left"><?php echo e($d->item->title); ?></td> 
                        <td class="text-right"><?php echo e(formatNumber($d->harga, 0, true)); ?></td> 
                        <td class="text-center"><?php echo e(formatNumber($d->qty)); ?></td> 
                        <td class="text-right"><?php echo e(formatNumber($d->subtotal, 0, true)); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">TOTAL</td> <th class="text-right"><?php echo e(formatNumber($row->subtotal, 0, true)); ?></th>
                    </tr>
                </tfoot>
            </table>
            
            <div class="row-fluid">
                <div class="span6">
                    <h4>Data Pembeli</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td><?php echo e(ucwords($row->nama_pembeli)); ?></td></tr>
                            <tr><th class="key">EMAIL</th> <td><?php echo e(strtolower($row->email_pembeli)); ?></td></tr>
                            <tr><th class="key">ALAMAT</th> <td><?php echo nl2br($row->alamat_pembeli); ?></td></tr>
                            <tr><th class="key">PROVINSI</th> <td><?php echo e(ucwords($row->provinsi_pembeli)); ?></td></tr>
                            <tr><th class="key">KOTA</th> <td><?php echo e(ucwords($row->kota_pembeli)); ?></td></tr>
                            <tr><th class="key">KODE POS</th> <td><?php echo e($row->kodepos_pembeli); ?></td></tr>
                            <tr><th class="key">TELEPON</th> <td><?php echo e($row->telepon_pembeli); ?></td></tr>
                        </thead>
                    </table>
                </div>
                <div class="span6">
                    <h4>Data Penerima</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td><?php echo e(ucwords($row->nama_penerima)); ?></td></tr>
                            <tr><th class="key">EMAIL</th> <td><?php echo e(strtolower($row->email_penerima)); ?></td></tr>
                            <tr><th class="key">ALAMAT</th> <td><?php echo nl2br($row->alamat_penerima); ?></td></tr>
                            <tr><th class="key">PROVINSI</th> <td><?php echo e(ucwords($row->provinsi_penerima)); ?></td></tr>
                            <tr><th class="key">KOTA</th> <td><?php echo e(ucwords($row->kota_penerima)); ?></td></tr>
                            <tr><th class="key">KODE POS</th> <td><?php echo e($row->kodepos_penerima); ?></td></tr>
                            <tr><th class="key">TELEPON</th> <td><?php echo e($row->telepon_penerima); ?></td></tr>
                        </thead>
                    </table>
                </div>
            </div>
            <br/>
            <h4>Pembayaran Tranfer Bank</h4>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                    <?php foreach(getBank() as $b): ?>
                        <div class="span4">
                            <img src="<?php echo e(asset( 'media/' . val($b, 'image') )); ?>" alt="<?php echo e(val($b, 'nama_bank')); ?>" style="widht: 80px;"/><br/>
                            <?php echo e(val($b, 'nama_bank')); ?></br/>
                            A.N : <?php echo e(val($b, 'nama_akun')); ?></br/>
                            Rek : <?php echo e(val($b, 'rekening')); ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if($rowConfirm): ?>
            <div class="row-fluid">
                <div class="span12">
                    <h4>Bukti Pembayaran</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">TANGGAL</th> <td><?php echo e(formatDate($rowConfirm->tanggal, 5)); ?></td></tr>
                            <tr><th class="key">TRANSFER KE AKUN</th> <td><?php echo e(val($rowConfirm, 'bank.nama_bank')); ?> <br/>
                                                                      <?php echo e(val($rowConfirm, 'bank.nama_akun')); ?><br/>
                                                                      <?php echo e(val($rowConfirm, 'bank.rekening')); ?>

                                                                      </td></tr>
                            <tr><th class="key">TRANSFER DARI</th> <td><?php echo e(val($rowConfirm, 'bank_dari')); ?> <br/>
                                                                      <?php echo e(val($rowConfirm, 'nama_pemilik')); ?>

                                                                      </td></tr>
                            <tr><th class="key">TOTAl TRANSFER</th> <td><?php echo e(formatNumber($rowConfirm->total, 0, true)); ?></td></tr>
                            <tr><th class="key">LAMPIRAN</th> <td>
                            <?php if( val($rowConfirm, 'image') ): ?>
                                <img src="<?php echo e(asset('media/'.val($rowConfirm, 'image'))); ?>" style="max-width: 100%;"/>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                            </td></tr>
                        </thead>
                    </table>
                </div>
            </div>
            <br/>
            <?php endif; ?>

            <div class="text-left">
                <a href="<?php echo e(url('member/histori-transaksi?page='.val($_GET, 'page'))); ?>" class="btn btn-default">Kembali</a>
                <?php if($row->status_pesanan=='PESANAN'): ?>
                <a href="<?php echo e(url('konfirmasi?inv='.$row->invoice)); ?>" class="btn btn-info" target="_blank">Konfirmasi</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
<style>
table  {
    background: #FFF;
}
table tr {
    vertical-align: top!important;
}
.key {
    width: 10px;
    white-space: nowrap;
    vertical-align: top!important;
}
.text-center {
    text-align: center!important;
}
.text-right {
    text-align: right!important;
}
</style>
<?php $__env->stopPush(); ?>