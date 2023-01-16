

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Kartu Rencana Studi</p>
    <div class="row">   
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="/krsmahasiswa" method="post">
              <?php echo e(csrf_field()); ?> 
              <div class="form-group row">
                <div class="card col-5" style="width: 18rem;">
                 
                  <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <ul class="list-group list-group-flush" value="<?php echo e($data->id); ?>">
                  
                 
                    <li class="list-group-item"><b>NIM : </b> <?php echo e($data->nim); ?> </li>
                    <li class="list-group-item"><b>Nama : </b> <?php echo e($data->name); ?> </li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> <?php echo e($data->study_program->name); ?></li>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </ul>
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                <li class="list-group ml-2"> 
                <select class="form-control" name="tahun_akademik_id" required="required">
                  <option value="">- Pilih Tahun Akademik -</option>
                  <?php $__currentLoopData = $academic_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($data->id==$tahun_akademik): ?>
                  <option selected value="<?php echo e($data->id); ?>">
                    <?php echo e($data->name); ?>

                    </option> 
                  <?php else: ?>
                  <option value="<?php echo e($data->id); ?>">
                    <?php echo e($data->name); ?>

                    </option> 
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </select>
              </li>
            </ul>
            <br>
            <button type="submit" class="btn btn-primary" >Refresh</button>
         
          </div>
          <?php if(session('status')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('status')); ?>

               <button type="button" class="close close-light" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
          <?php if(session('hapus')): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo e(session('hapus')); ?>

               <button type="button" class="close close-light" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php endif; ?>
      

          <form action="/krsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="tahun_akdemik" value="<?php echo e($tahun_akademik); ?>">
        </div>
      </div>
    </div>        
      
      <div class="col-12">  
      <div class="card">
        <div class="card-body">
      <ul>
      <a href="#" class="btn btn-warning ml-">Cetak</a>
      <a href="/krsmahasiswa/createmahasiswa/<?php echo e($tahun_akademik); ?>" class="btn btn-success ml-4">Tambah KRS</a>
    </ul>
    <form class="form-inline">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <br>
 
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center">
                <th>No</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Ruangan</th>
                <th>Semester</th>
                <th>Jam Kuliah</th>
                <th>Selesai Kuliah</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1  ?>
            <?php $__currentLoopData = $krsmahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $krsmahasiswas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($no); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->subject_course->name); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->subject_course->sk); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->academic_room->name); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->academic_year->semester); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->start_time); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->hour_over); ?></td>
              <td><?php echo e($krsmahasiswas->lecture_schedulings->lecturer->name); ?></td>
            
              <td >
                <a href="/krsmahasiswa/destroymahasiswa/<?php echo e($krsmahasiswas->id); ?> "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
            </td>
          </tr>
            <?php $no++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </form>
      </div>
    </div>
  </div>
    </div>
</div>
        <!-- /.card-body -->
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/mahasiswa/krs/indexmhs.blade.php ENDPATH**/ ?>