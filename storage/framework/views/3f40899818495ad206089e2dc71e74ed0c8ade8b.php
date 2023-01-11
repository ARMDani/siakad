

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Penjadwalan Kuliah</p>
    <div class="row">
      <div class="col-sm-3">
        <div class="card ">
          <div class="card-body ">
            <ul class="list-group list-group-flush bg-">
              <li class="list-group-item  "> <b>Program Studi </b> </li>
              <li class="list-group-item  ">Tahun Akademik </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-sm-9">
        <div class="card">
          <div class="card-body">
            <form action="/penjadwalan" method="post">
              <?php echo e(csrf_field()); ?>

            <ul class="list-group list-group-flush">
              <li class="list-group-item">: <?php echo e(Auth::user()->name); ?></a></li>
              <li class="list-group-item">
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

          <form action="/penjadwalan/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="tahun_akdemik" value="<?php echo e($tahun_akademik); ?>">
        </div>
      </div>
    </div>        
      
     <div class="card">
     
        <div class="card-body">
          <form class="input-group-append" action="/matakuliah/cari"  method="GET">
              <input class="form-control" type="text"  name="cari" placeholder="Cari Mata Kuliah .." value="<?php echo e(old('cari')); ?> ">
              <input type="submit" value="CARI">
          </form>
          
      </div>
      <ul>
      <a href="#" class="btn btn-warning ml-">Cetak</a>
      <a href="/penjadwalan/create/<?php echo e($tahun_akademik); ?>" class="btn btn-success ml-4">Tambah Jadwal</a>
    </ul>
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center">
              <th>No</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam Kuliah</th>
              <th>Selesai Kuliah</th>
              <th>Dosen Pengajar</th>
              <th>Ruangan</th>
              <th>Opsi</th>
            </tr>
            <?php $no = 1  ?>
            <?php $__currentLoopData = $matakuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matakuliahs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($no); ?></td>
                <td><?php echo e($matakuliahs->subject_course->name); ?></td>
                <td><?php echo e($matakuliahs->subject_course->sk); ?></td>
                <td><?php echo e($matakuliahs->class->name); ?></td>
                <td><?php echo e($matakuliahs->academic_day->name); ?></td>
                <td><?php echo e($matakuliahs->start_time); ?></td>
                <td><?php echo e($matakuliahs->hour_over); ?></td>
                <td><?php echo e($matakuliahs->lecturer->name); ?></td>
                <td><?php echo e($matakuliahs->academic_room->name); ?></td>
                <td >
                    <a href="/penjadwalankuliah/edit/<?php echo e($matakuliahs->id); ?>" class="btn btn-secondary"> <i class="nav-icon fas fa-edit"></i></a>
                    <a href="/penjadwalankuliah/hapus/<?php echo e($matakuliahs->id); ?> "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php $no++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </form>
      </div>
    </div>
  </div>
        <!-- /.card-body -->
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/prodi/penjadwalankuliah/index.blade.php ENDPATH**/ ?>