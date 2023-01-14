
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Mahasiswa</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/student/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="id" value="<?php echo e($students->id); ?>">
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="name" value="<?php echo e($students->name); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="number" required="required" name="nim" value="<?php echo e($students->nim); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="gender" required="required">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" <?php echo "Laki-Laki" == $students->gender ? 'selected' : ' ';  ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo "Perempuan" == $students->gender ? 'selected' : ' ';  ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="religion" required="required">
                                        <option value="">- Pilih Agama -</option>
                                        <option value="Islam" <?php echo "Islam" == $students->religion ? 'selected' : ' ';  ?>>Islam</option>
                                        <option value="Hindu" <?php echo "Hindu" == $students->religion ? 'selected' : ' ';  ?>>Hindu</option>
                                        <option value="Kristen" <?php echo "Kristen" == $students->religion ? 'selected' : ' ';  ?>>Kristen</option>
                                        <option value="Protestan" <?php echo "Protestan" == $students->religion ? 'selected' : ' ';  ?>>Protestan</option>
                                        <option value="Katolik" <?php echo "Katolik" == $students->religion ? 'selected' : ' ';  ?>>Katolik</option>
                                        <option value="Budha" <?php echo "Budha" == $students->religion ? 'selected' : ' ';  ?>>Budha</option>
                                        <option value="Konghucu" <?php echo "Konghucu" == $students->religion ? 'selected' : ' ';  ?>>Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="study_program_id" required="required">
                                        <option value="">- Pilih Program Studi -</option>
                                        <?php $__currentLoopData = $study_program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>" <?php echo $data->id == $students->study_program_id ? 'selected' : ' ';  ?>>
                                            <?php echo e($data->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Asal Daerah<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="districts_id" required="required">
                                    <option value="">- Pilih Asal Daerah -</option>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" <?php echo $data->id == $students->districts_id ? 'selected' : ' ';  ?>>
                                        <?php echo e($data->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="class_id" required="required">
                                        <option value="">- Pilih Kelas -</option>
                                        <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>" <?php echo $data->id == $students->class_id ? 'selected' : ' ';  ?>>
                                            <?php echo e($data->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="generations_id" required="required">
                                        <option value="">- Pilih Angkatan -</option>
                                        <?php $__currentLoopData = $generations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>" <?php echo $data->id == $students->generations_id ? 'selected' : ' ';  ?>>
                                            <?php echo e($data->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">Foto<span class="required" style="color: #dd4b39;">*</span></label>
                                    <div class="">
                                        <input lass="form-control" type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="<?php echo e($students->photo); ?>" accept=".png, .jpeg, .jpg" required="required"><br/>
                                        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                                    </div>
                                </div>


                                
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/student" class="btn btn-danger">Kembali</a>
                        
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
           
          </div>
        </div>
  
        
  
      </div>
      
  
    </div>
    
   
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/student/edit.blade.php ENDPATH**/ ?>