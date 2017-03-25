<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e($title); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('/global/font-awesome-4.6.1/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('/global/ionicons-master/css/ionicons.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/iCheck/square/green.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/iCheck/flat/green.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/select2/select2.min.css">
    
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo e($pub_url); ?>/plugins/timepicker/bootstrap-timepicker.min.css">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="/global/js/html5shiv.min.js"></script>
        <script src="/global/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php echo e(asset('/global/css/datatables.bootstrap.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/global/css/fixedColumns.bootstrap.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/global/css/token-input-facebook.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('/global/css/jquery.datetimepicker.min.css')); ?>"/>
    <!-- Main -->
    <link rel="stylesheet" href="<?php echo e(asset('/global/css/main.css')); ?>"/>
    
    <?php echo $__env->yieldPushContent('style'); ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper box" style="border-top: 0;">
        
      <?php echo $header; ?>

      
      <!-- Left side column. contains the logo and sidebar -->
      <?php echo $Lmenu; ?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo e($subtitle); ?> <small><?php echo e($desc); ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> <?php echo e(trans('global.dashboard')); ?></a></li>
            <?php $no = 0; ?>
            <?php if( !empty($breadcrumb) ): ?>
                <?php foreach( $breadcrumb as $no=>$b ): ?>
                    <li class="<?php echo e($no==(count($breadcrumb)-1) ? 'active' : ''); ?>"><a href="<?php echo e($b['url']); ?>"><?php echo e($b['name']); ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php echo $__env->yieldContent('content'); ?>            
        </section>
      </div>
      
      <?php echo $footer; ?>


      <!-- Control Sidebar -->
      <?php echo $control; ?>

      
      <div class="overlay" id="main-loding" style="display: none;">
          <i class="fa fa-refresh fa-spin"></i>
      </div>
    </div><!-- ./wrapper -->
    
    <!-- Notification -->
    <?php echo $notif; ?>

    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo e($pub_url); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('/global/js/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo e($pub_url); ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo e(asset('/global/js/raphael-min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e($pub_url); ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo e($pub_url); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo e($pub_url); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e($pub_url); ?>/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('/global/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e($pub_url); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo e($pub_url); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e($pub_url); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo e($pub_url); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo e($pub_url); ?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo e($pub_url); ?>/plugins/select2/select2.full.min.js"></script>
    <!-- Notif -->
    <script src="<?php echo e(asset('/global/js/jquery.bootstrap-growl.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e($pub_url); ?>/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e($pub_url); ?>/dist/js/demo.js"></script>
    <!-- Datatable -->
    <script src="<?php echo e(asset('/global/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/global/js/datatables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('/global/js/dataTables.fixedColumns.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/global/js/jquery.tokeninput.js')); ?>"></script>
    <!-- Main -->
    <script src="<?php echo e(asset('/global/js/jquery.datetimepicker.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/global/js/number.js')); ?>"></script>
    <script src="<?php echo e(asset('/global/js/main.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e($pub_url); ?>/plugins/iCheck/icheck.min.js"></script>
    
    <!-- CUSTOM JS -->
    <script>
        <?= packerJs("
        $(function() {    
            if ( $('#list-table').length>0 )
            {
                var objTbl = $('#list-table');
                var objCol= [];
                objTbl.find('thead th').each(function(i, v){
                    objCol.push({ 
                        'data': $(v).data('column'), 
                        'orderable': $(v).data('sort') ? true : false, 
                        'searchable': $(v).data('search') ? true : false, 
                    });
                });

                var oTable = objTbl.DataTable({
                    processing: true,
                    serverSide: true,
                    order : [[0, 'desc']],
                    ajax: {
                        url: objTbl.data('url'),
                        method: 'POST',
                        data: {
                            '_token': objTbl.data('token'),
                        }
                    },
                    columns: objCol,
                    'language': {
                        'lengthMenu': '".trans('global.table_menu')."',
                        'zeroRecords': '".trans('global.table_nothing')."',
                        'info': '".trans('global.table_info')."',
                        'infoEmpty': '".trans('global.table_empty')."',
                        'infoFiltered': '".trans('global.table_filter')."',
                        'search': '".trans('global.table_search')."'
                    },
                });
                
                //SUBMIT
                $(document).on('submit', '#formData', function(){
                    
                    if ( $('#inputImage').length>0 ) 
                    {
                        var form = $(this);
                        var formData = new FormData();
                        formData.append('file', $('#inputImage')[0].files[0]);
                        formData.append('post', form.serialize());
                        formData.append('_token', '".csrf_token()."');
                        
                        $.ajax({
                            type		: 'POST',
                            url			: form.attr('action'),
                            data        : formData,
                            cache       : false,
                            contentType : false,
                            processData : false,
                            beforeSend	: function(xhr) { loading(1) },
                            xhr: function() {  // custom xhr
                                myXhr = $.ajaxSettings.xhr();
                                if(myXhr.upload){ // if upload property exists
                                    myXhr.upload.addEventListener('progress', function(e){
                                        var percent = (e.loaded / e.total) * 100;
                                        console.log(percent);
                                    }, false); // progressbar
                                }
                                return myXhr;
                            },
                            error: errorHandler = function() {
                                alert('Something went wrong!');
                            },
                            success		: function(dt){
                            
                            if ( dt.status ) oTable.ajax.reload();
                            
                            if ( dt.form ) {form.closest('.box').replaceWith(atob(dt.form));initPlugin();}
                            
                            if ( dt.message ) initNotif(atob(dt.message));

                            if ( dt.rdr ) window.location.href = dt.rdr;
                
                            },
                        }).done(function(){ loading(0) }); 
                    }
                    else
                    {    
                        var form = $(this);
                        
                        $.ajax({
                            type		: 'POST',
                            url			: form.attr('action'),
                            data        : form.serialize(),
                            beforeSend	: function(xhr) { loading(1) },
                            success		: function(dt){
                            
                            if ( dt.status ) oTable.ajax.reload();
                            
                            if ( dt.form ) {form.closest('.box').replaceWith(atob(dt.form));initPlugin();}
                            
                            if ( dt.message ) initNotif(atob(dt.message));

                            if ( dt.rdr ) window.location.href = dt.rdr;
                
                            },
                        }).done(function(){ loading(0) }); 
                    }
                    
                    return false;
                });
                
                //EDIT & RESET & DELETE
                $(document).on('click', '.btn-edit, .btn-reset, .btn-delete', function(){
                    
                    var ButtonElm = $(this);
                    var isDelete = ButtonElm.hasClass('btn-delete');
                    var url = ButtonElm.attr('href');
                    var modal = ButtonElm.closest('.modalConfirmation');

                    if ( $('#formData').length==0 && !isDelete) 
                    {
                        window.location.href = url; 

                        return false;
                    }
            
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
                              initPlugin();
                          } 
                        },
                	}).done(function(){ if ( isDelete ) { modal.find('.delete-loding').hide(); } else { loading(0); } });
                    
                    return false;
                });    
            }

            //UPLOAD
            if ( $('#changeImage').length>0 && $('#imagePreview').length>0 && $('#inputImage').length>0 )
            {
                $(document).on('click', '#changeImage', function(){
                    $('#inputImage').trigger('click');
                    return false;
                });
                $(document).on('change', '#inputImage', function(){
                    readURL(this, '#imagePreview');
                });
            }

            initPlugin();
            function initPlugin()
            {
                select2();
                $('input:not(.excheck)').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%' // optional
                });
            }
            function readURL(input, elm) 
            {
                if (input.files && input.files[0]) 
                {
                    var reader = new FileReader();            
                    reader.onload = function (e) {
                        
                        $(elm).attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('[name=username]').focus();
            
            $(document).on('submit', 'form', function(){
                $('#main-loding').show()
            });
                
            function select2()
            {
                $('.select2').select2();
            }    
        });")?>
    </script>
    <!-- EOF CUSTOM JS -->
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>
</html>