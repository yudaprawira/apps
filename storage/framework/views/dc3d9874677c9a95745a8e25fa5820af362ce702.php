<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo e(trans('system/user.title')); ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table">
                    <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th><?php echo e(trans('system/user.name')); ?></th>
                      <th><?php echo e(trans('system/user.email')); ?></th>
                      <th><?php echo e(trans('system/user.lastlogin')); ?></th>
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
$(function() {
    var oTable = $('#list-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?php echo e(url("/system-user")); ?>',
            method: 'POST',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
            }
        },
        columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'email' },
            { data: 'last_login' },
            { data: 'action', orderable: false, searchable: false }
        ],
        "language": {
            "lengthMenu": "<?php echo e(trans('global.table_menu')); ?>",
            "zeroRecords": "<?php echo e(trans('global.table_nothing')); ?>",
            "info": "<?php echo e(trans('global.table_info')); ?>",
            "infoEmpty": "<?php echo e(trans('global.table_empty')); ?>",
            "infoFiltered": "<?php echo e(trans('global.table_filter')); ?>",
            "search": "<?php echo e(trans('global.table_search')); ?>"
        }
    });
    
    //SUBMIT
    $(document).on('submit', '#formData', function(){
        
        var form = $(this);
        
        $.ajax({
    		type		: 'POST',
    		url			: form.attr('action'),
            data        : form.serialize(),
    		beforeSend	: function(xhr) { loading(1) },
    		success		: function(dt){
              
              if ( dt.status ) oTable.ajax.reload();
              
              if ( dt.form ) form.closest('.box').replaceWith(atob(dt.form));
              
    	      if ( dt.message ) initNotif(atob(dt.message));

        	},
    	}).done(function(){ loading(0) }); 
        
        return false;
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
              }
              else
              {
    		      $('#formData').closest('.box').replaceWith(dt);
                  initTokenInput("#pegawai_id", 1);
              } 
            },
    	}).done(function(){ if ( isDelete ) { modal.find('.delete-loding').hide(); } else { loading(0); } });
        
        return false;
    });
    
    initTokenInput("#pegawai_id", 1);
    
    $(document).on('change', '#pegawai_id', function(){
       var val = getValueTokenInput('#pegawai_id');
       
       if ( $('[name=username]').val()=='' ) $('[name=username]').val(val.username);
       if ( $('[name=email]').val()=='' ) $('[name=email]').val(val.email);
         
    });
    
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>