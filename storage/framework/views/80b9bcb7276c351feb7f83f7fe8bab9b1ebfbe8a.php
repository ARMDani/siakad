
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Mata Kuliah</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/fakultas/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($course->id); ?>"> <br/>
                    <div class="form-group">
                        <label>Kode Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="number" required="required" name="course_code" value="<?php echo e($course->course_code); ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="<?php echo e($course->name); ?>">
                    </div>
                    <div class="form-group">
                        <label>SKS<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="number" required="required" name="sk" value="<?php echo e($course->sk); ?>">
                    </div>
                    <div class="form-group">
                        <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="number" required="required" name="semester" value="<?php echo e($course->semester); ?>">
                    </div>
                    <div class="form-group">
                        <label>Dosen<span class="required" style="color: #dd4b39;">*</span></label>
                        <select class="form-control" name="lecturer_id" required="required">
                            <?php $__currentLoopData = $leacture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($data->id); ?>" <?php echo $data->id == $course->lecturer_id ? 'selected' : ' ';  ?>>
                                <?php echo e($data->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                    </div>
                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                <a href="/matakuliah" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/subject_course/edit.blade.php ENDPATH**/ ?>