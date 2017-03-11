<div class="gaji-content">
    <?php if(!$isPrint): ?>
    <div class="row h-filter">
        <form>
        <div class="col-md-3">
            <div class="form-group has-feedback">
              <label><?php echo e(trans('kepegawaian/pegawai.bagian')); ?></label>
              <select class="form-control select2" name="bagian[]" multiple="1">
                <?php foreach( $bagian_bln as $b ): ?>
                    <option value="<?php echo e($b['id']); ?>" <?php echo e(isset($get['bagian']) &&  is_array($get['bagian']) && in_array($b['id'], $get['bagian']) ?'selected="selected"' : ''); ?>><?php echo e($b['nama']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        <div class="col-md-1 no-padding">
            <div class="form-group has-feedback">
              <label><?php echo e(trans('aktivitas/produksi.year')); ?></label>
              <select name="filter_year" id="filter_year_bln" class="form-control select2 input-param">
                <?php for( $i=date("Y"); $i>=config('produksi.product_year')['start']; $i-- ): ?>
                <option value="<?php echo e($i); ?>" <?php echo isset($filter_year) && $filter_year==$i ? "selected='selected'" : ""; ?>><?php echo e($i); ?></option>
                <?php endfor; ?>
              </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group has-feedback">
              <label><?php echo e(trans('aktivitas/produksi.month')); ?></label>
              <select name="filter_month" id="filter_month_bln"  class="form-control select2 input-param">
                    <?php for( $i=1; $i<=12; $i++ ): ?>
                    <option value="<?php echo e(str_pad($i, 2, "0", STR_PAD_LEFT)); ?>" <?php echo isset($filter_month) && intval($filter_month)==$i ? "selected='selected'" : ""; ?>><?php echo e(trans('global.month_long')[($i-1)]); ?></option>
                    <?php endfor; ?>
              </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group has-feedback">
              <label style="display: block;">&nbsp;</label>
              <button class="btn btn-default no-radius btn-block" type="submit" name="filter_type" value="bln"> <i class="fa fa-filter"></i> <?php echo e(trans('global.filter')); ?> </button>
            </div>
        </div>
        </form>
    </div>
    <div class="text-right" style="padding-bottom: 5px;">
        <a href="<?php echo e(url('rekapitulasi/print/bln'.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : ''))); ?>" class="btn btn-primary btn-flat" target="_blank"> <i class="fa fa-print"></i> Cetak </a>
    </div>
    <?php else: ?>
    <h4>Rekapitulasi Bulan <?php echo e(formatDate($filter_year.'-'.$filter_month, 4)); ?></h4>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th class="text-left"><?php echo e(trans('laporan/rekap.bagian')); ?></th>
                    <th class="text-center"><?php echo e(trans('laporan/rekap.total_karyawan')); ?></th>
                    <th class="text-center"><?php echo e(trans('laporan/rekap.total_gaji')); ?></th>
                </thead>
                <tbody>
                    <?php foreach( $data_bulanan as $r ): ?>
                    <tr>
                        <td class="bag"><?php echo e($r->nama_bagian); ?></td>
                        <td class="kar"><?php echo e(formatNumber($r->total_pegawai)); ?></td>
                        <td class="gaj"><?php echo e(formatNumber($r->total_gaji, 0, true)); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-right"><?php echo e(trans('laporan/rekap.total')); ?></th>
                        <th class="kar"><?php echo e(formatNumber($total_bulanan->total_pegawai)); ?></th>
                        <th class="gaj"><?php echo e(formatNumber($total_bulanan->total_gaji, 0, true)); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-center">
                            <?php echo e(ucwords(Terbilang($total_bulanan->total_gaji).' rupiah ')); ?>

                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <br />
    <table style="width: 100%;">
        <tr>
            <td class="text-center">
                Direkap <br />Keuangan,
                <br /><br /><br />
                <?php echo e(ucwords( session::get('ses_emp_name') )); ?>

            </td>
            <td class="text-center">
                Disetujui <br />Direktur,
                <br /><br /><br />
                Tanyono
            </td>
        </tr>
    </table>
</div>    
<?php $__env->startPush('style'); ?>
<style>
th {
   white-space: nowrap; 
}
.kar, .gaj {
    text-align: right;
    width: 100px;
    white-space: nowrap;
}
.kar {
    text-align: center;
}
</style>
<?php $__env->stopPush(); ?>


<?php if($isPrint): ?>
<link rel="stylesheet" href="<?php echo e($pub_url); ?>/bootstrap/css/bootstrap.min.css">
<script>
    window.print();
</script>
<?php endif; ?>