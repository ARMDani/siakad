
<?php $__env->startSection('content'); ?>
<html>
<head>
        <title>Tambah Jadwal</title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/css/bootstrap.min.css')); ?>">
 </head>
 <body>
    <div class="content-wrapper">
        <div class="col-sm-12">
         <div class="card">
          <div class="card-body">
           <h3>Tambah Rencana Studi </h3>
           <form action="/krsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-bordered table-hover table-wrapper">
          
                        <thead>
                          <tr class="text-center">
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Ruangan</th>
                            <th>Semester</th>
                            <th>Jam Kuliah</th>
                            <th>Selesai Kuliah</th>
                            <th>Dosen</th>                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1  ?>
                          <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   
                          <tr>
                            
                            <td><input name="pilih[]" value="<?php echo e($data->id); ?>" type="checkbox" ></td>
                            <td><?php echo e($no); ?></td>
                            <td><?php echo e($data->subject_course->name); ?></td>
                            <td><?php echo e($data->subject_course->sk); ?></td>
                            <td><?php echo e($data->academic_room->name); ?></td>
                            <td><?php echo e($data->subject_course->semester); ?></td>
                            <td><?php echo e($data->start_time); ?></td>
                            <td><?php echo e($data->hour_over); ?></td>
                           
                            <td><?php echo e($data->lecturer->name); ?></td>                            
                        </tr>
                        </tbody>
                       
                        <?php $no++ ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
                      </table>
                      <br>
                      <input class="btn btn-primary" type="submit" value="Simpan Data">
                            
                      <a href="/krsmahasiswa" class="btn btn-danger">Kembali</a>
                    </form>
                   </div>
                  </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
       
    </body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/mahasiswa/krs/create.blade.php ENDPATH**/ ?>