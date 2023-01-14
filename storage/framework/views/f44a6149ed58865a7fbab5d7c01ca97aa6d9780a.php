
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
           <h3>Tambah Jadwal </h3>
           <form action="/penjadwalan/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-sm-3">
                  <div class="card ">
                    <div class="card-body">
                        <select class="form-control" name="academic_year" required="required">
                            <?php $__currentLoopData = $academic_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data->id==Request::segment(3)): ?> 
                            <option selected value="<?php echo e($data->id); ?>">
                              <?php echo e($data->name); ?>

                              </option> 
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="subject_course" required="required">
                                <option value="">- Pilih Mata Kuliah -</option>
                                <?php $__currentLoopData = $subject_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                   <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="class" required="required">
                                <option value="">- Pilih Kelas -</option>
                                <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Hari<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="academic_day" required="required">
                                <option value="">- Pilih Hari -</option>
                                <?php $__currentLoopData = $academic_day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label>Jam Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="time" name="start_time"placeholder="Masukkan Alamat ..." required="required">
                        </div>

                        <div class="form-group">
                            <label>Selesai Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="time" name="hour_over"placeholder="Masukkan Alamat ..." required="required">
                        </div>
                        
                        <div class="form-group">
                            <label>Dosen Pengajar<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="lecturer" required="required">
                                <option value="">- Pilih Dosen -</option>
                                <?php $__currentLoopData = $lecturer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Ruangan<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="academic_room" required="required">
                                <option value="">- Pilih Ruangan -</option>
                                <?php $__currentLoopData = $academic_room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>
                            <input class="btn btn-primary" type="submit" value="Simpan Data">
                            
                            <a href="/penjadwalan" class="btn btn-danger">Kembali</a>
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
        </div>
       
    </body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/prodi/penjadwalankuliah/create.blade.php ENDPATH**/ ?>