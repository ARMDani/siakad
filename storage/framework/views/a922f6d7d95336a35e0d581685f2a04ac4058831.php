
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Grade Nilai</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/nilai_grade/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($grade->id); ?>">
                        <div class="form-group">
                            <label>Grade<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" required="required" name="name" value="<?php echo e($grade->name); ?>">
                        </div>
                        <div class="form-group">
                          <label>Bobot<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="number" required="required" name="bobot" value="<?php echo e($grade->bobot); ?>">
                        </div>
                        <div class="form-group">
                          <label>Poin<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="poin" value="<?php echo e($grade->poin); ?>">
                        </div>
                        <div class="form-group">
                          <label>Keterangan<span class="required" style="color: #dd4b39;">*</span></label>
                          <select class="form-control" name="keterangan">
                              <option value="">- Pilih Keterangan -</option>
                              <option value="LULUS" <?php echo "LULUS" == $grade->keterangan ? 'selected' : ' ';  ?>>LULUS</option>
                              <option value="TIDAK LULUS" <?php echo "TIDAK LULUS" == $grade->keterangan ? 'selected' : ' ';  ?>>TIDAK LULUS</option>
                          </select>
                      </div>
                        <input class="btn btn-secondary" type="submit" value="Simpan Data">
                        <a href="/nilai_grade" class="btn btn-danger">Kembali</a>
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
      
      
      
      
      
      
































<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/grade/edit.blade.php ENDPATH**/ ?>