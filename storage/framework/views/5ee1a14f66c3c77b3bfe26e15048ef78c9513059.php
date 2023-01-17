

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Jadwal Mengajar</p>
    <div class="row">      
      <div class="col-sm">
        <div class="card">
          <div class="card-body">
              <div class="form-group row">
                <div class="card col-8" style="width: 18rem;">
                  <form action="/dosen" method="post">
                    <?php echo e(csrf_field()); ?>

                  <?php $__currentLoopData = $lecturer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <ul class="list-group list-group-flush" value="<?php echo e($data->id); ?>">
                    <li class="list-group-item"><b>NIDN : </b> <?php echo e($data->nidn); ?> </li>
                    <li class="list-group-item"><b>Nama : </b> <?php echo e($data->name); ?> </li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> <?php echo e($data->study_program->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </ul>                 
                </div>
              </div>
              <label>Tahun Akademik</label>
                <select class="form-control col-3" name="tahun_akademik_id" required="required">
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
              <button type="submit" class="btn btn-primary" >Refresh</button>
          </div>
          <form action="/dosen/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            
        </div>
      </div>
    </div>        
      
     <div class="card">
      <div class="card-body">
      <div>
      <a href="#" class="btn btn-warning ml-2 mb-2">-Cetak-</a>
      </div>
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center  bg-light text-dark">
              <th>No</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam Kuliah</th>
              <th>Selesai Kuliah</th>
              <th>Ruangan</th>
            </tr>
            <?php $no = 1  ?>
            <?php $__currentLoopData = $dosenjadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center" value="<?php echo e($jadwal->id); ?>">
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($jadwal->subject_course->name); ?></td>
                <td><?php echo e($jadwal->subject_course->sk); ?></td>
                <td><?php echo e($jadwal->class->name); ?></td>
                <td><?php echo e($jadwal->academic_day->name); ?></td>
                <td><?php echo e($jadwal->start_time); ?></td>
                <td><?php echo e($jadwal->hour_over); ?></td>
                <td><?php echo e($jadwal->academic_room->name); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
      
        </table>
      </form>
    </div>
    </div>
    </div>
  </div>
       
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/dosen/jadwal/index.blade.php ENDPATH**/ ?>