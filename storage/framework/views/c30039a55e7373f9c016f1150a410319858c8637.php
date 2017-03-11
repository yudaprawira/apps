<?php $__env->startSection('content'); ?>
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="<?php echo e(isset($_GET['filter_type']) ? ( $_GET['filter_type']=='brg' ? 'active' : '' ) : 'active'); ?>"><a class="no-radius" href="#borongan" data-toggle="tab"><?php echo e(trans('aktivitas/penggajian.borongan')); ?></a></li>
          <li class="<?php echo e(isset($_GET['filter_type']) && $_GET['filter_type']=='bln' ? 'active' : ''); ?>"><a class="no-radius" href="#bulanan" data-toggle="tab"><?php echo e(trans('aktivitas/penggajian.bulanan')); ?></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane <?php echo e(isset($_GET['filter_type']) ? ( $_GET['filter_type']=='brg' ? 'active' : '' ) : 'active'); ?>" id="borongan">
            <?php echo $borongan; ?>

          </div>
          <div class="tab-pane <?php echo e(isset($_GET['filter_type']) && $_GET['filter_type']=='bln' ? 'active' : ''); ?>" id="bulanan">
            <?php echo $bulanan; ?>

          </div>
        </div>
    </div>    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
.btn-filter-control {
    left: 10px;
}
.gaji-content
{
    background: #fff;
    padding: 10px;
    border: 1px solid #ddd;
    border-top: none;
}
.h-filter {
    background: #ddd;
    margin: 2px 0 20px;
    padding: 10px 0;
}
.modalGaji .modal-header,
.modalGaji .modal-body{
    border-bottom: 1px solid #a0a0a0;
}
.slip-k {
    white-space: nowrap;
    width: 60px;
}
.slip-input {
    padding: 5px;
    height: 25px;
    text-align: right;
    width: 100%!important;
    margin: -6px;
    margin-top: -10px;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    
    initWeek();
    initCalc();
    initNumber();
    
    $(document).on('change', '[name=filter_year]', function(){
        $(this).closest('form').find('[type=submit]').click();
    });
    $(document).on('focus', '.input-plus, .input-min', function(){
        this.select();
    });
    $(document).on('click', '.btn-save', function(){
       var act = $(this).data('action');
       $(this).closest('form').find('[name=_action]').val(act); 
       $(this).closest('form').submit(); 
    });
    
    var oTableBRG = $('#list-table-brg').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $('#list-table-brg').data('url'),
            method: 'POST',
            data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                '_type': 'brg',
                '_year': $('#filter_year_brg').val(), 
                '_month': $('#filter_month_brg').val(), 
                '_period': $('#filter_period_brg').val(), 
            }
        },
        columns: [
            { data: 'id', orderable: false, searchable: false },
            { data: 'NIP' },
            { data: 'nama' },
            { data: 'bagian', orderable: false, searchable: false  },
            { data: 'total', orderable: false, searchable: false  },
            { data: 'status', orderable: false, searchable: false  },
            { data: 'slip', orderable: false, searchable: false  },
        ],
        scrollX:        false,
        scrollCollapse: false,
        /*fixedColumns:   {
            leftColumns: 3
        },*/
        'language': {
            'lengthMenu': '<?php echo e(trans('global.table_menu')); ?>',
            'zeroRecords': '<?php echo e(trans('global.table_nothing')); ?>',
            'info': '<?php echo e(trans('global.table_info')); ?>',
            'infoEmpty': '<?php echo e(trans('global.table_empty')); ?>',
            'infoFiltered': '<?php echo e(trans('global.table_filter')); ?>',
            'search': '<?php echo e(trans('global.table_search')); ?>'
        },
        'bStateSave': true,
        'fnStateSave': function (oSettings, oData) {
            localStorage.setItem( 'DataTables_'+window.location.pathname, JSON.stringify(oData) );
        },
        'fnStateLoad': function (oSettings) {
            return JSON.parse( localStorage.getItem('DataTables_'+window.location.pathname) );
        },
        'fnDrawCallback': function( oSettings ) {
          if ( oSettings._iRecordsTotal>0 )
            $('#global-action-brg').show();
          else
            $('#global-action-brg').hide();
        }
    });
    
    
    var oTableBLN = $('#list-table-bln').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $('#list-table-bln').data('url'),
            method: 'POST',
            data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                '_type': 'bln',
                '_year': $('#filter_year_bln').val(), 
                '_month': $('#filter_month_bln').val(), 
            }
        },
        columns: [
            { data: 'id', orderable: false, searchable: false },
            { data: 'NIP' },
            { data: 'nama' },
            { data: 'bagian', orderable: false, searchable: false  },
            { data: 'total', orderable: true, searchable: false  },
            { data: 'status', orderable: true, searchable: true  },
            { data: 'slip', orderable: false, searchable: false  },
        ],
        scrollX:        false,
        scrollCollapse: false,
        /*fixedColumns:   {
            leftColumns: 3
        },*/
        'language': {
            'lengthMenu': '<?php echo e(trans('global.table_menu')); ?>',
            'zeroRecords': '<?php echo e(trans('global.table_nothing')); ?>',
            'info': '<?php echo e(trans('global.table_info')); ?>',
            'infoEmpty': '<?php echo e(trans('global.table_empty')); ?>',
            'infoFiltered': '<?php echo e(trans('global.table_filter')); ?>',
            'search': '<?php echo e(trans('global.table_search')); ?>'
        },
        'bStateSave': true,
        'fnStateSave': function (oSettings, oData) {
            localStorage.setItem( 'DataTables_'+window.location.pathname, JSON.stringify(oData) );
        },
        'fnStateLoad': function (oSettings) {
            return JSON.parse( localStorage.getItem('DataTables_'+window.location.pathname) );
        },
        'fnDrawCallback': function( oSettings ) {
          if ( oSettings._iRecordsTotal>0 )
            $('#global-action-bln').show();
          else
            $('#global-action-bln').hide();
        }
    });
    
    //submit form
    $(document).on('submit', '.form-gaji', function(){
       var frm = $(this); 
       var type = frm.data('type'); 
       $.ajax({
    		type		: 'POST',
    		url			: frm.attr('action'),
            data        : frm.serialize(),
    		beforeSend	: function(xhr) { frm.find('.overlay').show(); frm.find('.btn-save').attr('disabled', true); },
    		success		: function(dt){
              if ( dt.status )
              {
                  if ( type=='brg' ) oTableBRG.ajax.reload();  
                  if ( type=='bln' ) oTableBLN.ajax.reload();
              }
              if ( dt.message ) initNotif(atob(dt.message));
        	},
    	}).done(function(){ frm.find('.overlay').hide(); frm.find('.btn-save').attr('disabled', false); frm.find('.btn-close').click(); loading(0);});
        
        return false; 
    });
    
    //GLOBAL
    $(document).on('click', '#accept_all, #reject_all', function(){
       var b = $(this);
       var t = b.html();
        
       $.ajax({
    		type		: 'GET',
    		url			: b.attr('href'),
    		beforeSend	: function(xhr) { loading(1); },
    		success		: function(dt){

              if ( b.data('type')=='brg' ) oTableBRG.ajax.reload();  
              if ( b.data('type')=='bln' ) oTableBLN.ajax.reload();

              if ( dt.message ) initNotif(atob(dt.message));
        	},
    	}).done(function(){ loading(0); }); 
        
       return false; 
    });
    
    //checkbox 
    $(document).on('click', '.excheck', function(){
        var isCheck = $(this).is(':checked');
        $(this).closest('.tab-pane').find('.dataTable tbody input[type=checkbox]').prop('checked', isCheck);
        if (isCheck) $('#terapkan, #actions').show(); else $('#terapkan, #actions').hide();
   });
   $(document).on('click', '.dataTable tbody input[type=checkbox]', function(){
        var isCheck = $(this).is(':checked');
        if (isCheck) $('#terapkan, #actions').show();
   });
   //terapkan
   $(document).on('click', '#terapkan', function(){
    var act = $('#actions').val();

    if ( $('.dataTable tbody input:checked').length>0 )
    {
        $('.dataTable tbody input:checked').each(function(){
            $(this).closest('tr').find('.'+act).click();
        });
    }
    else
    {
        setTimeout(function(){ 
                
           $.bootstrapGrowl('Pilih minimal satu item', {
                type: 'danger',
                align: 'center',
                width:'auto'
           }); 
            
        }, (500) );
    }
    return false;
   });

    
    function initCalc()
    {
        var total = 0;
        $(document).on('input', '.input-plus, .input-min', function(){
           var tb = $(this).closest('.tb-slip');
           total = parseInt(tb.find('[name=subtotal1]').val());
           tb.find('.input-plus').each(function(){
               if ($(this).val()) 
               {
                total += parseInt(numeral($(this).val()).value());
               } 
            });
           tb.find('.subtotal2').text('Rp ' + initNumber(total)); 
           tb.find('[name=subtotal2]').val(total);
           
           tb.find('.input-min').each(function(){
               if ( $(this).val() )
               {
                total -= parseInt(numeral($(this).val()).value());
               } 
            });
           tb.find('.total').text('Rp ' + initNumber(total)); 
           tb.find('[name=total]').val(total);
        });
    }

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>