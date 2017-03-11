<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <div class="box-tools pull-left btn-filter-control">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div>
                  <h3 class="box-title" style="padding-left: 20px;"> FILTER
                    <a class="btn btn-success flat" href="<?php echo e(url('pegawai/add')); ?>" style="position: absolute; right: 5px;top: 3px;"><?php echo e(trans('global.form_add')); ?></a>
                  </h3>        
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <form role="form">
                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('kepegawaian/pegawai.bagian')); ?></label>
                              <select class="form-control select2" name="bagian[]" multiple="1">
                                <?php foreach( $bagian as $dID=>$dName ): ?>
                                    <option value="<?php echo e($dID); ?>" <?php echo e(isset($get['bagian']) &&  is_array($get['bagian']) && in_array($dID, $get['bagian']) ?'selected="selected"' : ''); ?>><?php echo e($dName); ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('kepegawaian/pegawai.golongan')); ?></label>
                              <select class="form-control select2" name="golongan[]" multiple="1">
                                <?php foreach( $golongan as $dName ): ?>
                                    <option value="<?php echo e($dName); ?>" <?php echo e(isset($get['golongan']) &&  is_array($get['golongan']) && in_array($dName, $get['golongan'])?'selected="selected"' : ''); ?>><?php echo e($dName); ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                              <label><?php echo e(trans('kepegawaian/pegawai.education')); ?></label>
                              <select class="form-control select2" name="pendidikan[]" multiple="1">
                                <?php foreach( $pendidikan as $dName ): ?>
                                    <option value="<?php echo e($dName); ?>" <?php echo e(isset($get['pendidikan']) &&  is_array($get['pendidikan']) && in_array($dName, $get['pendidikan'])?'selected="selected"' : ''); ?>><?php echo e(strtoupper($dName)); ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback" style="margin-bottom: 27px;">
                              <label><?php echo e(trans('kepegawaian/pegawai.gender')); ?></label> <br />
                              <select name="jenis_kelamin" class="form-control select2">
                                <option value="A" <?php echo e(isset($get['jenis_kelamin']) && $get['jenis_kelamin']=='A' ? 'selected="1"': 'selected="1"'); ?>><?php echo e(trans('global.all')); ?></option>
                                <option value="L" <?php echo e(isset($get['jenis_kelamin']) && $get['jenis_kelamin']=='L' ? 'selected="1"': ''); ?>><?php echo e(trans('kepegawaian/pegawai.male')); ?></option>
                                <option value="P" <?php echo e(isset($get['jenis_kelamin']) && $get['jenis_kelamin']=='P' ? 'selected="1"': ''); ?>><?php echo e(trans('kepegawaian/pegawai.female')); ?></option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="text-right">
                        <button type="submit" class="btn btn-default no-radius"><i class="fa fa-filter"></i> FILTER</button>
                      </div>
                    </form>  
                </div>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"><?php echo e(trans('kepegawaian/pegawai.title')); ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table">
                    <thead>
                    <tr>
                      <th><?php echo e(trans('kepegawaian/pegawai.nip')); ?></th>
                      <th><?php echo e(trans('kepegawaian/pegawai.name')); ?></th>
                      <th><?php echo e(trans('kepegawaian/pegawai.bagian')); ?></th>
                      <th><?php echo e(trans('kepegawaian/pegawai.golongan')); ?></th>
                      <th style="width: 90px;white-space: nowrap;"><?php echo e(trans('global.action')); ?></th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
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
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
<?= packerJs("
$(function() {
    var oTable = $('#list-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '".url('/pegawai'.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : ''))."',
            method: 'POST',
            data: {
                '_token': '".csrf_token()."',
            }
        },
        columns: [
            { data: 'NIP' },
            { data: 'nama' },
            { data: 'bagian', orderable: false, searchable: false  },
            { data: 'golongan'},
            { data: 'action', orderable: false, searchable: false }
        ],
        order : [
            [1, 'asc']
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
    
    //DELETE
    $(document).on('click', '.btn-delete', function(){
        
        var ButtonElm = $(this);
        var isDelete = ButtonElm.hasClass('btn-delete');
        var url = ButtonElm.attr('href');
        var modal = ButtonElm.closest('.modalConfirmation');

        $.ajax({
    		type		: 'GET',
    		url			: url,
    		beforeSend	: function(xhr) { if ( isDelete ) { modal.find('.delete-loding').show(); } else { loading(1); } },
    		success		: function(dt){
    		  if ( isDelete )
              {
                  oTable.ajax.reload();
                  //close modal
                  modal.find('.close').click();  
                  //reset
                  $('.btn-reset').click();
                  //message
                  if ( dt.message ) initNotif(atob(dt.message));
              }
            },
    	}).done(function(){ if ( isDelete ) { modal.find('.delete-loding').hide(); } else { loading(0); } });
        
        return false;
    });
});")?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>