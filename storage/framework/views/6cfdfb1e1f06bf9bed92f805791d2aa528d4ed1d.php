<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default no-radius collapsed-box">
                <div class="box-header with-border">
                  <div class="box-tools pull-left btn-filter-control">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                  <h3 class="box-title" style="padding-left: 20px;"> FILTER
                    
                  </h3>        
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <form role="form">
                      <div class="row">
                        <div class="col-md-2">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('kepegawaian/pegawai.bagian')); ?></label>
                              <select class="form-control select2" name="bagian[]" multiple="1">
                                <?php foreach( $bagian as $dID=>$dName ): ?>
                                    <option value="<?php echo e($dID); ?>" <?php echo e(isset($get['bagian']) &&  is_array($get['bagian']) && in_array($dID, $get['bagian']) ?'selected="selected"' : ''); ?>><?php echo e($dName); ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('kepegawaian/pegawai.golongan')); ?></label>
                              <select class="form-control select2" name="golongan[]" multiple="1">
                                <?php foreach( $golongan as $dName ): ?>
                                    <option value="<?php echo e($dName); ?>" <?php echo e(isset($get['golongan']) &&  is_array($get['golongan']) && in_array($dName, $get['golongan'])?'selected="selected"' : ''); ?>><?php echo e($dName); ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/presensi.date')); ?></label>
                              <input name="filterTanggal" class="form-control tDate" type="text" value="<?php echo e(isset($get['filterTanggal']) ? $get['filterTanggal'] : formatDate(null, 2)); ?>" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('global.status')); ?></label>
                              <select class="form-control select2" name="status_absen">
                                <option value="A"><?php echo e(trans('global.all')); ?></option>
                                <option value="b" <?php echo e(isset($get['status_absen']) && $get['status_absen']=='b' ? 'selected="selected"' : ''); ?> ><?php echo e(trans('aktivitas/presensi.belum_absen')); ?></option>
                                <option value="s" <?php echo e(isset($get['status_absen']) && $get['status_absen']=='s' ? 'selected="selected"' : ''); ?>><?php echo e(trans('aktivitas/presensi.sudah_absen')); ?></option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('aktivitas/presensi.terlambat')); ?> / <?php echo e(trans('aktivitas/presensi.lembur')); ?></label>
                              <select class="form-control select2" name="terlambat_lembur[]" multiple="1">
                                <option value="A"><?php echo e(trans('global.all')); ?></option>
                                <option value="T" <?php echo e(isset($get['terlambat_lembur']) && is_array($get['terlambat_lembur']) && in_array('T', $get['terlambat_lembur']) ? 'selected="selected"' : ''); ?> ><?php echo e(trans('aktivitas/presensi.terlambat')); ?></option>
                                <option value="L0" <?php echo e(isset($get['terlambat_lembur']) && is_array($get['terlambat_lembur']) && in_array('L0', $get['terlambat_lembur']) ? 'selected="selected"' : ''); ?>><?php echo e(trans('aktivitas/presensi.lembur')); ?> 0.5 <?php echo e(trans('global.hours')); ?></option>
                                <option value="L1" <?php echo e(isset($get['terlambat_lembur']) && is_array($get['terlambat_lembur']) && in_array('L1', $get['terlambat_lembur']) ? 'selected="selected"' : ''); ?>><?php echo e(trans('aktivitas/presensi.lembur')); ?> 1 <?php echo e(trans('global.hours')); ?></option>
                                <option value="L2" <?php echo e(isset($get['terlambat_lembur']) && is_array($get['terlambat_lembur']) && in_array('L2', $get['terlambat_lembur']) ? 'selected="selected"' : ''); ?>><?php echo e(trans('aktivitas/presensi.lembur')); ?> 2 <?php echo e(trans('global.hours')); ?></option>
                                <option value="L3" <?php echo e(isset($get['terlambat_lembur']) && is_array($get['terlambat_lembur']) && in_array('L3', $get['terlambat_lembur']) ? 'selected="selected"' : ''); ?>><?php echo e(trans('aktivitas/presensi.lembur')); ?> 3 <?php echo e(trans('global.hours')); ?></option>
                                <option value="L4" <?php echo e(isset($get['terlambat_lembur']) && is_array($get['terlambat_lembur']) && in_array('L4', $get['terlambat_lembur']) ? 'selected="selected"' : ''); ?>><?php echo e(trans('aktivitas/presensi.lembur')); ?> 4 <?php echo e(trans('global.hours')); ?></option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>&nbsp;</label><br />
                            <button type="submit" class="btn btn-default no-radius"><i class="fa fa-filter"></i> <?php echo e(trans('global.filter')); ?> </button>
                            <a href="<?php echo e(url('presensi')); ?>" class="btn btn-default no-radius"><i class="fa fa-refresh"></i> <?php echo e(trans('global.clear_filter')); ?> </a>
                        </div>
                      </div>
                    </form>  
                </div>
              </div>
        </div>
    </div>
    <div class="row" id="tab-daily">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3><?php echo e(trans('aktivitas/presensi.title')); ?> : <?php echo e(isset($get['filterTanggal']) ? formatDate($get['filterTanggal']) : formatDate()); ?>

                        <div class="pull-right" style="margin-top: -5px;">
                            <div style="color: #666;font-size: 12px"><sup style="color: red;">*</sup> <?php echo e(trans('aktivitas/presensi.label_tolerance', ['time'=>config('presensi.tolerance')])); ?></div>
                            <div style="color: #666;font-size: 12px"><sup style="color: red;">*</sup> <?php echo e(trans('aktivitas/presensi.label_max_lembur_brg', ['jam'=>config('presensi.max_jam_lembur')['brg']])); ?></div>
                            <div style="color: #666;font-size: 12px"><sup style="color: red;">*</sup> <?php echo e(trans('aktivitas/presensi.label_max_lembur_bulanan', ['jam'=>config('presensi.max_jam_lembur')['bln']])); ?></div>
                        </div>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo e(url('presensi/bulk-action')); ?>">
                        <input type="hidden" name="tgl" value="<?php echo e(isset($_GET['filterTanggal']) ? date('Y-m-d', strtotime($_GET['filterTanggal'])) : date('Y-m-d')); ?>" />
                        <table class="table table-striped table-bordered nowrap table-condensed" id="list-table">
                            <thead>
                                <th><?php echo e(trans('kepegawaian/pegawai.nip')); ?></th>
                                <th><?php echo e(trans('kepegawaian/pegawai.name')); ?></th>
                                <th><?php echo e(trans('kepegawaian/pegawai.bagian')); ?></th>
                                <th class="th_masuk"><?php echo e(trans('aktivitas/presensi.time_start')); ?></th>
                                <th class="th_pulang"><?php echo e(trans('aktivitas/presensi.time_end')); ?></th>
                                <th class="terlambat"><?php echo e(trans('aktivitas/presensi.terlambat')); ?></th>
                                <th class="terlambat"><?php echo e(trans('aktivitas/presensi.lembur')); ?></th>
                                <th><?php echo e(trans('aktivitas/presensi.reason')); ?></th>
                            </thead>
                        </table>
                    </form> 
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .btn-filter-control {
        left: 10px;
    }
    .select2 {
        width: 100%!important;
    }
    #presensiTabContent {
        background: #fff;
        padding: 10px;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }
    #tab-daily .firstClass {
        width: 30px!important;
    }
    #tab-daily .firstClass:after {
        display: none!important;
    }
    #tab-daily .th_masuk, #tab-daily .th_pulang,
    #tab-daily .tgl_masuk, #tab-daily .tgl_pulang, #tab-daily .terlambat, #tab-daily .lembur{
        width: 100px!important;
        text-align: center;
    }
    #tab-daily table.dataTable thead th:nth-child(1),
    #tab-daily table.dataTable tbody td:nth-child(1){
        width: 25px!important;
        text-align: center;
        padding-right: 10px!important;
    }
    #tab-daily table.dataTable thead th:nth-child(1):after{
        display: none;
    }
    #tab-daily table.dataTable tbody td select{
        height: 25px;
        padding: 0;
        width: 100%!important;
    }
    .bulkTime{
        display: none;
    }
    #accordionImport .panel {
        margin-top: -1px;
    }
    .list-note
    {
        color: #666;
        font-size: 12px;
        list-style: inside none disc;
        margin: 20px;
        text-align: left;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
<?= packerJs("
$(function() {
    
    var oTableDaily = $('#list-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '".url('laporan-presensi'.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : ''))."',
            method: 'POST',
            data: {
                '_token': '".csrf_token()."',
            }
        },
        columns: [
            { data: 'NIP' },
            { data: 'nama' },
            { data: 'bagian', orderable: false, searchable: false  },
            { data: 'time_start', orderable: false, searchable: false, class:'text-center'  },
            { data: 'time_end', orderable: false, searchable: false, class:'text-center'  },
            { data: 'terlambat', orderable: false, searchable: false, class:'terlambat'  },
            { data: 'lembur', orderable: false, searchable: false, class:'lembur'  },
            { data: 'reason', orderable: false, searchable: false  },
        ],
        order : [
            [2, 'asc']
        ],
        scrollX:        false,
        scrollCollapse: false,
        /*fixedColumns:   {
            leftColumns: 3
        },*/
        'language': {
            'lengthMenu': '".trans('global.table_menu')."',
            'zeroRecords': '".trans('global.table_nothing')."',
            'info': '".trans('global.table_info')."',
            'infoEmpty': '".trans('global.table_empty')."',
            'infoFiltered': '".trans('global.table_filter')."',
            'search': '".trans('global.table_search')."'
        },
        'drawCallback': function( settings ) {
            $('.time-val').each(function(){
               $(this).closest('.terlambat').addClass('bgRed'); 
            });
            $('.bgGreen').each(function(){
               $(this).closest('.lembur').addClass('bgGreen-'+$(this).data('val')); 
            });
            $('#tab-daily table.dataTable tbody td select').each(function(){
                $(this).closest('tr').addClass('keterangan_'+$(this).val());
            });
            
            //init checked
            var isChecked = $('.excheck').is(':checked');
            $('.dataTable tbody input[type=checkbox]').prop('checked', isChecked);
        },
        'bStateSave': false,
        'fnStateSave': function (oSettings, oData) {
            localStorage.setItem( 'DataTables_'+window.location.pathname, JSON.stringify(oData) );
        },
        'fnStateLoad': function (oSettings) {
            return JSON.parse( localStorage.getItem('DataTables_'+window.location.pathname) );
        }
    });
    
    
});")?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>