

<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if(Auth::user()->role->id == 1): ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Selamat Datang</strong></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="text-light"><?php echo e($fakultas[0]->jumlah); ?></h3>
                <p>Fakutas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/fakultas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 
                  <h3 class="text-light"><?php echo e($programstudi[0]->nilai); ?></h3>
                
                <p>Prodi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/prodi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-dark"><?php echo e($dosen[0]->nilai); ?></h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/leacture" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-light"><?php echo e($mahasiswas[0]->nilai); ?></h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/student" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <?php endif; ?>

        <?php if(Auth::user()->role->id == 2): ?>
        <section class="content">
          <div class="container-fluid">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Selamat Datang</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class="text-light"><?php echo e($matakuliah[0]->nilai); ?></h3>

                <p>Mata Kuliah</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-dark"><?php echo e($dosen[0]->nilai); ?></h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-light"><?php echo e($mahasiswas[0]->nilai); ?></h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <?php endif; ?>

        <?php if(Auth::user()->role->id == 3): ?>
            <div>
              <br>
                <?php $__currentLoopData = $lecturer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <H1 class="text-center">Selamat Datang</H1>
                <H1 class="text-center"><strong><?php echo e($data->name); ?></strong></H1>
                <h5 class="text-center"><strong>NIDN :</strong> <?php echo e($data->nidn); ?></h5>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <br>
              <br>
              <br>
              <br>
              <div class="text-center mt-6">
                <img src="<?php echo e(asset('dist/img/02.png')); ?>"  alt="Responsive image" width="230px">
              </div>
              <br>
              <br>
              <h1 class="text-center">SISTEM INFORMASI AKADEMIK</h1>
            <?php endif; ?>
            
            
            <?php if(Auth::user()->role->id == 4): ?> 
            <div>
              <br>
                <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                <H1 class="text-center">Selamat Datang</H1>
                <H1 class="text-center"><strong><?php echo e($data->name); ?></strong></H1>
                <h5 class="text-center"><strong>NIM : </strong><?php echo e($data->nim); ?></h5>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <br>
              <br>
              <br>
              <br>
              <div class="text-center mt-6">
                <img src="<?php echo e(asset('dist/img/02.png')); ?>"  alt="Responsive image" width="230px">
              </div>
              <br>
              <br>
              <h1 class="text-center">SISTEM INFORMASI AKADEMIK</h1>
            <?php endif; ?>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
          
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
              </div>
            </div>
            <!-- /.card -->

           
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/home.blade.php ENDPATH**/ ?>