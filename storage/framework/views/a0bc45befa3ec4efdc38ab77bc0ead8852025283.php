<div class="gaji-content">
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
              <label><?php echo e(trans('global.status')); ?></label>
              <select name="filter_status" id="filter_status_bln" class="no-padding form-control select2 input-param">
                <option value="-">SEMUA</option>
                <option value="baru" <?php echo isset($get['filter_status']) && $get['filter_status']=='baru' ? 'selected="selected"' : ''; ?>>BARU</option>
                <option value="review" <?php echo isset($get['filter_status']) && $get['filter_status']=='review' ? 'selected="selected"' : ''; ?>>REVIEW</option>
                <option value="revisi" <?php echo isset($get['filter_status']) && $get['filter_status']=='revisi' ? 'selected="selected"' : ''; ?>>REVISI</option>
                <option value="selesai" <?php echo isset($get['filter_status']) && $get['filter_status']=='selesai' ? 'selected="selected"' : ''; ?>>SELESAI</option>
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
    
    <table class="table table-striped table-bordered nowrap table-condensed" id="list-table-bln" style="width: 100%;" data-url="<?php echo e(url('laporan-penggajian'.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : ''))); ?>">
        <thead>
            <th><input type="checkbox" class="excheck" /></th>
            <th><?php echo e(trans('kepegawaian/pegawai.nip')); ?></th>
            <th><?php echo e(trans('kepegawaian/pegawai.name')); ?></th>
            <th><?php echo e(trans('kepegawaian/pegawai.bagian')); ?></th>
            <th><?php echo e(trans('global.total')); ?></th>
            <th><?php echo e(trans('global.status')); ?></th>
            <th style="width: 60px!important;white-space: nowrap;"><?php echo e(trans('global.action')); ?></th>
        </thead>
    </table>
    
    <div class="row">
        <div class="col-md-2">
            <select class="form-control" id="actions" style="display: none;">
                <option value="selesai"><?php echo e(trans('laporan/penggajian.setuju')); ?></option>
                <option value="review"><?php echo e(trans('laporan/penggajian.tolak')); ?></option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" id="terapkan" style="display: none;" class="btn btn-default no-radius"><?php echo e(trans('global.apply')); ?></button>
        </div>
    </div>
    
    <div class="text-center" style="padding: 50px 0;display: none;" id="global-action-bln">
        <a href="<?php echo e(url('laporan-penggajian/tindakan/setuju?type=bln&y='.$filter_year.'&m='.$filter_month)); ?>" id="accept_all" data-type="bln" class="btn btn-success no-radius"> <i class="fa fa-check"></i> <?php echo e(trans('global.accept_all')); ?></a>    
        <a href="<?php echo e(url('laporan-penggajian/tindakan/tolak?type=bln&y='.$filter_year.'&m='.$filter_month)); ?>" id="reject_all" data-type="bln" class="btn btn-danger no-radius"> <i class="fa fa-remove"></i> <?php echo e(trans('global.reject_all')); ?></a>
    </div>
</div>    
<?php $__env->startPush('style'); ?>
<style>
</style>
<?php $__env->stopPush(); ?>
