

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content" id="content-dashboard">
    <div class="overlay">
      <!-- Small boxes (Stat box) -->
      
      <div class="text-welcome">
        Hai<br />
        Selamat Datang di              
        <h3><?php echo e(config('app.title')); ?></h3>
      </div>
                        
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo e($totalKaryawan); ?></h3>
              <p>Total Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo e(url('pegawai')); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo e($totalHadir); ?><sup style="font-size: 20px">%</sup></h3>
              <p>Kehadiran Hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo e(url('presensi')); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($totalProduksi); ?></h3>
              <p>Total Produksi Minggu ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-hand-lizard-o"></i>
            </div>
            <a href="<?php echo e(url('produksi')); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo e($totalGaji); ?></h3>
              <p>Total Gaji Bulan ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="<?php echo e(url('rekapitulasi')); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
      </div><!-- /.row -->
      
    </div>
    </section><!-- /.content -->
<style>
.text-welcome {
    text-align: center;
    font-size: 19px;
    padding: 30px 0;
    
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.be_template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>