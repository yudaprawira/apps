<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">SYSTEM LOG</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table">
                    <thead>
                    <tr>
                      <th>Waktu</th>
                      <th>Keterangan</th>
                      <th>Metode</th>
                      <th>Pengguna</th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
<?= packerJs("
$(function() {
    var oTable = $('#list-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '".url("/system-log")."',
            method: 'POST',
            data: {
                '_token': '".csrf_token()."',
            }
        },
        columns: [
            { data: 'created_at' },
            { data: 'activity' },
            { data: 'method' },
            { data: 'created_by' },
        ],
        'language': {
            'lengthMenu': '".trans('global.table_menu')."',
            'zeroRecords': '".trans('global.table_nothing')."',
            'info': '".trans('global.table_info')."',
            'infoEmpty': '".trans('global.table_empty')."',
            'infoFiltered': '".trans('global.table_filter')."',
            'search': '".trans('global.table_search')."'
        }
    });
    
});")?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>