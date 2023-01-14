
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Program Studi</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/prodi/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($prodis->id); ?>">
                        <div class="form-group">
                            <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" required="required" name="code_prodi" value="<?php echo e($prodis->code_prodi); ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" required="required" name="name" value="<?php echo e($prodis->name); ?>">
                        </div>
                        <div class="form-group">
                            <label>Fakultas<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="study_faculty_id" required="required">
                                <option value="">- Pilih Fakultas -</option>
                                <?php $__currentLoopData = $study_faculty_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" <?php echo $data->id == $prodis->study_faculty_id ? 'selected' : ' ';  ?>>
                                    <?php echo e($data->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/prodi" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/studi_program/edit.blade.php ENDPATH**/ ?>