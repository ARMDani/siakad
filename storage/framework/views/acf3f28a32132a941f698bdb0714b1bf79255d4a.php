
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Mahasiswa</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <form action="/student/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama ..." type="text" name="nama" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="nim" placeholder="Masukkan Nim ..." required="required">
                        </div>
                        <div class="form-group ">
                            <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="gender" name="group_id" required="required">
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <option value="1" >Laki-Laki</option>
                                    <option value="0" >Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="agama" name="group_id" required="required">
                                <option value="">- Pilih Agama -</option>
                                <option value="Islam" >Islam</option>
                                <option value="Hindu" >Hindu</option>
                                <option value="Kristen" >Kristen</option>
                                <option value="Protestan" >Katolik</option>
                                <option value="Katolik" >Budha</option>
                                <option value="Budha" >Konghucu</option>
                                <option value="Konghucu" >Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="program_studi" required="required">
                                <option value="">- Pilih Program Studi -</option>
                                <?php $__currentLoopData = $study_program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Asal Daerah<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="asal_daerah" required="required">
                                <option value="">- Asal Daerah -</option>
                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                           <select class="form-control" name="kelas" required="required">
                                <option value="">- Kelas -</option>
                                <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="angkatan" required="required">
                                <option value="">- Angkatan -</option>
                                <?php $__currentLoopData = $generations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Photo<span class="required" style="color: #dd4b39;">*</span></label>
                            <div class="">
                                <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="" accept=".png, .jpeg, .jpg" required="required">
                                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                            </div>
                        </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/student" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
  
        
  
      </div>
      
  
    </div>
    
   
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/student/create.blade.php ENDPATH**/ ?>