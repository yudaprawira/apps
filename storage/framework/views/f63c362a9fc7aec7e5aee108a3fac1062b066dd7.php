<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="text-center">EBLEK</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo e(url('produksi/save')); ?>" method="POST" id="formInput">
                        <button type="submit" class="hide">Simpan</button>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row row-h">
                                    <div class="col-md-4">MPS</div>
                                    <div class="col-md-8">
                                        <select name="product_mps" class="form-control select2 input-param">
                                            <?php foreach( config('app.mps') as $k=>$mps ): ?>
                                            <option value="<?php echo e($k); ?>" <?php echo isset($product_mps) && $product_mps==$k ? "selected='selected'" : ""; ?>><?php echo e($mps); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row row-h">
                                    <div class="col-md-4"><?php echo e(trans('aktivitas/produksi.proses')); ?></div>
                                    <div class="col-md-8">
                                        <select name="product_bagian" class="form-control select2 input-param">
                                            <?php foreach( $bagian as $k=>$b ): ?>
                                            <option value="<?php echo e($k); ?>" <?php echo isset($product_bagian) && $product_bagian==$k ? "selected='selected'" : ""; ?> data-kelompok="<?php echo e($b['maks_golongan']); ?>"><?php echo e($b['nama']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row row-h">
                                    <div class="col-md-4"><?php echo e(trans('aktivitas/produksi.kelompok')); ?></div>
                                    <div class="col-md-8">
                                        <select name="product_kelompok" class="form-control input-param" data-selected="<?php echo e(isset($product_kelompok) && $product_kelompok ? $product_kelompok : ""); ?>"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <div class="row row-h">
                                    <div class="col-md-4"><?php echo e(trans('aktivitas/produksi.year')); ?></div>
                                    <div class="col-md-8">
                                        <select name="product_year" class="form-control select2 input-param">
                                            <?php for( $i=config('produksi.product_year')['start']; $i<=config('produksi.product_year')['end']; $i++ ): ?>
                                            <option value="<?php echo e($i); ?>" <?php echo isset($product_year) && $product_year==$i ? "selected='selected'" : ""; ?>><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row row-h">
                                    <div class="col-md-4"><?php echo e(trans('aktivitas/produksi.month')); ?></div>
                                    <div class="col-md-8">
                                        <select name="product_month" class="form-control input-param">
                                            <?php for( $i=1; $i<=12; $i++ ): ?>
                                            <option value="<?php echo e(str_pad($i, 2, "0", STR_PAD_LEFT)); ?>" <?php echo isset($product_month) && intval($product_month)==$i ? "selected='selected'" : ""; ?> data-week="<?php echo e(isset($product_weeks[str_pad($i, 2, "0", STR_PAD_LEFT)]) ? $product_weeks[str_pad($i, 2, "0", STR_PAD_LEFT)] : date('W')); ?>"><?php echo e(trans('global.month_long')[($i-1)]); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row row-h">
                                    <div class="col-md-4"><?php echo e(trans('aktivitas/produksi.week')); ?></div>
                                    <div class="col-md-8">
                                        <select name="product_week" class="form-control input-param" data-selected="<?php echo e(isset($product_week) && $product_week ? $product_week : ""); ?>"></select>
                                    </div>
                                </div>                                                        
                            </div>
                        </div>
                        <hr />
                        
                        <div class="box" id="table-product">
                            <div class="box-body no-padding" style="overflow-x: auto;">
                                <table class="table table-bordered table-hover table-striped table-condensed box" changed="0" id="tb-eblek">
                                    <tr>
                                        <td style="text-align: center;padding: 70px 0;font-weight: bold;font-style: italic;">LOADING ...</td>
                                    </tr>
                                </table>                                                                        
                            </div>
                        </div>
                        <div class="text-center" style="padding: 20px;">
                            <button type="submit" class="btn btn-primary no-radius btn-lg"><?php echo e(trans('global.save')); ?></button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    
    <!-- MODAL -->
    <div class="modal fade" id="modalSave" tabindex="-1" role="dialog" aria-labelledby="modalSaveLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modalSaveLabel"><?php echo e(trans('global.confirm_save')); ?></h4>
          </div>
          <div class="modal-body">
            <?php echo e(trans('global.confirm_stext')); ?>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default flat" id="cancel-save"><?php echo e(trans('global.act_cancel')); ?></button>
            <button type="button" class="btn btn-primary flat"><?php echo e(trans('global.save')); ?></button>
          </div>
        </div>
      </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
<style>
.box-primary {
    background: #fff;
}
.table-header td {
    padding: 2px 10px;
    text-transform: uppercase;
    font-weight: bold;
}
#table-product {
    padding: 0;
    border: 0;
    background: none;
    box-shadow: none;
    margin: 0;
    border-radius: 0;
}
.row-h {
    padding: 5px;
    line-height: 30px;
}
#tb-eblek thead th{
    text-align: center;
    font-size: 12px;
    padding: 0 2px;
}

#tb-eblek thead tr:nth-child(1),
#tb-eblek thead tr:nth-child(4), .bg-blue{
    background: #6795ce;
}
#tb-eblek tbody td input{
    padding: 0;
    height: 30px;
    text-align: center;
}
#tb-eblek tfoot th {
    border: double #f4f4f4;
}
#tb-eblek tfoot td {
    font-size: 10px;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function(){
        $(document).on('change', '[name="product_year"]', function(){
            $.get("<?php echo e(url('produksi/ajax-month/')); ?>/"+$(this).val(), function(result){
                $("[name=product_month]").replaceWith(result);
                initWeek();
                initTable();
            });            
        });
        $(document).on('change', '[name="product_month"]', function(){
            initWeek();   
        });
        $(document).on('change', '[name=product_bagian]', function(){
            initKelompok();
        });
        $(document).on('click', '[name="product_month"], [name=product_bagian], [name=product_mps], [name=product_kelompok], [name=product_year], [name=product_week]', function(e){
            if ( parseInt($('#tb-eblek').attr('changed'))==1 )
            {
                $('#modalSave').modal('show');
                return false;
            }
        });
        $(document).on('change', '[name="product_month"], [name=product_bagian], [name=product_mps], [name=product_kelompok], [name=product_year], [name=product_week]', function(e){
            initTable();
        });
        
        //eblek
        $(document).on('click', '#tb-eblek tbody td input', function(){
           $(this).select(); 
        });
        $(document).on('click', '#cancel-save', function(){
           $('#modalSave').modal('hide');
           $('#tb-eblek').attr('changed', 0);
        });        
        $(document).on('input', '#tb-eblek input', function(){
            $('#tb-eblek').attr('changed', 1);
        });
        $(document).on('click', '#modalSave .btn-primary', function(){
            $('#formInput').submit();
            $('#tb-eblek').attr('changed', 0);
            $('#modalSave').modal('hide');
        });

        $(document).on('submit', '#formInput', function(){
            
            stringToNum();
            
            $.ajax({
        		type		: 'POST',
        		url			: $(this).attr('action'),
                data        : $(this).serialize(),
        		beforeSend	: function(xhr) { loading(1) },
        		success		: function(dt){
                  
        	      if ( dt.message ) initNotif(atob(dt.message));
                  $('#tb-eblek').attr('changed', 0);        
                  initTable();
        
            	},
        	}).done(function(){ loading(0); }); 
            
            return false;
        });
        
        //modal lembur
        $(document).on('input', '.product_actual', function(){
           var t = $(this).data('target');
           if ( t ) 
           {
            $(t).modal('show');
            $(this).closest('td').find('.produk_jkn').val($(this).val());
            $(this).closest('td').find('.tot_actual').val($(this).val());
            $(this).closest('td').find('.produk_jkn').focus();
           } 
        });
        $(document).on('input', '.modal-lembur input', function(){
           var tot = 0;
               tot+= parseInt( numeral($(this).closest('.modal-lembur').find('.produk_jkn').val()).value() ); 
               tot+= parseInt( numeral($(this).closest('.modal-lembur').find('.produk_jl1').val()).value() ); 
               tot+= parseInt( numeral($(this).closest('.modal-lembur').find('.produk_jl2').val()).value() );
               tot = tot>0 ? tot : 0; 
            $(this).closest('.modal-lembur').find('.tot_actual').text(initNumber(tot));
            $(this).closest('td').find('.product_actual').val(initNumber(tot));
        });
        $(document).on('keypress', '.modal-lembur input', function(e){
            if ( e.keyCode==13 )
            {
                $(this).closest('.modal-lembur').find('.btn-close').click();
                return false;
            }
        });
        
        initKelompok();
        initWeek();
        initTable();
        
        function initWeek()
        {
            var weeks = $('[name="product_month"]').find('option:selected').data('week');
            var selected = $('[name=product_week]').data("selected");
            $('[name=product_week]').html('');
            var content = '';
            $.each(weeks, function(i, v){
                content += '<option value="'+i+'" '+ (selected==i?'selected="selected"' : '') +' >'+v+'</option>';
            }); 
            $('[name=product_week]').append(content); 
        }
        
        function initKelompok()
        {
            $('[name=product_kelompok]').html('');
            var kelompok = $('[name=product_bagian]').find('option:selected').data('kelompok');
            var selected = $('[name=product_bagian]').data('selected');
            var content = '';
            for(var i=1; i<=kelompok;i++)
            {
                content += '<option value="'+toRomawi(i)+'" '+ (selected==toRomawi(i)?'selected="selected"' : '') +' >'+toRomawi(i)+'</option>';
            }
            $('[name=product_kelompok]').append(content);
        }
        function initTable()
        {
            $('#tb-eblek').append('<div class="overlay" style="display: none;"><i class="fa fa-refresh fa-spin"></i></div>');
            var params = '_token=<?php echo e(csrf_token()); ?>&date='+$('[name=product_week] option:selected').text();
            $('.input-param').each(function(i){
               params += '&' + $(this).attr('name')+'='+$(this).val(); 
            });
            
            $.ajax({
        		type		: 'POST',
        		url			: '<?php echo e(url("produksi")); ?>',
                data        : params,
        		beforeSend	: function(xhr) { $('#table-product .overlay').show(); },
        		success		: function(dt){
                  $('#tb-eblek').replaceWith(dt);
                  initNumber();
            	},
        	}).done(function(){ $('#table-product .overlay').hide(); });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>