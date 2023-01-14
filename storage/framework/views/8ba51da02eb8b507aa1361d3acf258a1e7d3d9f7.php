
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Fakultas</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <?php $__currentLoopData = $faculty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/fakultas/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($faculti->id); ?>">
                        <div class="form-group">
                        <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="code_faculty" value="<?php echo e($faculti->code_faculty); ?>">
                        </div>
                        <div class="form-group">
                        <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="<?php echo e($faculti->name); ?>">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Simpan Data">
                        <a href="/fakultas" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/faculty/edit.blade.php ENDPATH**/ ?>