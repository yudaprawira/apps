<?php $__env->startSection('content'); ?>
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            <section class="span12 cart-holder">
                <div class="heading-bar">
                    <h2>MEMBER AREA</h2>
                    <span class="h-line"></span>
                </div>

                <div class="row-fluid">
                    <div class="span3">
                        <div class="well">
                            <ul class="menu-member">
                                <li> <a href="<?php echo e(url('member')); ?>">Profil</a> </li>
                                <li> <a href="<?php echo e(url('member/histori-transaksi')); ?>">Histori Transaksi</a> </li>
                                <li> <a href="<?php echo e(url('member/logout')); ?>">Logout</a> </li>
                            </ul>
                        </div>
                    </span>
                    <div class="span9">
                        <?php echo $member_content; ?>

                    </span>
                </div>

            </section>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
.well{
    border-radius: 0!important;
}
.menu-member {
    margin: 0;
    padding: 0;
    list-style: none;
}
.menu-member a {
    display: block;
    padding: 10px 5px;
    font-size: 16px;
    border-bottom: 1px solid #ddd;
    text-decoration: none;
}
.menu-member li a:hover {
    background: #ddd;
}
.menu-member li:last-child a {
    border-bottom: none;
}
#formAccount{
    margin: 0;
}
#formAccount [type="submit"] {
    border: 0;
    font-size: 14px;
    color: #fff;
    padding: 10px 20px;
    background: #98b827;
    cursor: pointer;
    transition: width 1s;
    -moz-transition: 1s;
    -webkit-transition: 1s;
    -o-transition: 1s;
}
#formAccount [type="text"], #formAccount [type="password"] {
        padding: 20px 10px;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){
    $(document).on('submit', '#formAccount', function(){
        
        var frm = $(this);

        $.ajax({
            type		: 'POST',
            url			: frm.attr('action'),
            data		: frm.serialize(),
            beforeSend	: function(xhr) { loading(1); },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status == true )
                {
                    if ( dt.redirect ) 
                    {
                        window.location.href = dt.redirect;
                    }
                    else
                    {
                        window.location.reload();
                    }
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>