<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo e(trans('kepegawaian/bagian.title')); ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table">
                    <thead>
                    <tr>
                      <th><?php echo e(trans('kepegawaian/bagian.name')); ?></th>
                      <th><?php echo e(trans('kepegawaian/bagian.type_gaji')); ?></th>
                      <th style="width: 90px;white-space: nowrap;"><?php echo e(trans('global.action')); ?></th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-4">
            <?php echo $form; ?>

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
            url: '".url("/bagian")."',
            method: 'POST',
            data: {
                '_token': '".csrf_token()."',
            }
        },
        columns: [
            { data: 'nama' },
            { data: 'tipe' },
            { data: 'action', orderable: false, searchable: false }
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
    
    //SUBMIT
    initNumber(null, '0,0.00', 'blur');
    $(document).on('submit', '#formData', function(){
        
        var form = $(this);
        stringToNum();
        
        $.ajax({
    		type		: 'POST',
    		url			: form.attr('action'),
            data        : form.serialize(),
    		beforeSend	: function(xhr) { loading(1); },
    		success		: function(dt){
              
              if ( dt.status ) oTable.ajax.reload();
              
              if ( dt.form ) form.closest('.box').replaceWith(atob(dt.form));
              
              if ( dt.message ) initNotif(atob(dt.message));

        	},
    	}).done(function(){ loading(0) }); 
        
        return false;
    });
    
    $(document).on('change', '[name=tipe]', function(){
       if ( $(this).val()=='brg' )
       {
        $('.non-borongan').hide();
       }
       else
       {
        $('.non-borongan').show();
       }
    });
    
    //EDIT & RESET & DELETE
    $(document).on('click', '.btn-edit, .btn-reset, .btn-delete', function(){
        
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
                  
                  if ( dt.message ) initNotif(atob(dt.message));
              }
              else
              {
    		      $('#formData').closest('.box').replaceWith(dt);
              } 
            },
    	}).done(function(){ if ( isDelete ) { modal.find('.delete-loding').hide(); } else { loading(0); } });
        
        return false;
    });
});")?>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>