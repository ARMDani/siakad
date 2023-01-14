
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Tahun Akademik</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <?php $__currentLoopData = $academic_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun_akademik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form action="/tahun_akademik/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($tahun_akademik->id); ?>">
                        <div class="form-group">
                            <label>Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" required="required" name="name" value="<?php echo e($tahun_akademik->name); ?>">
                        </div>
                        <div class="form-group">
                            <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="semester">
                                <option value="">- Pilih Semester -</option>
                                <option value="Ganjil" <?php echo "Ganjil" == $tahun_akademik->semester ? 'selected' : ' ';  ?>>Ganjil</option>
                                <option value="Genap" <?php echo "Genap" == $tahun_akademik->semester ? 'selected' : ' ';  ?>>Genap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mulai Input Nilai Mahasiswa<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="start_time_value" value="<?php echo e($tahun_akademik->start_time_value); ?>">
                        </div>
                        <div class="form-group">
                            <label>Akhir Input Nilai Mahasiswa<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="end_of_time_value" value="<?php echo e($tahun_akademik->end_of_time_value); ?>">
                        </div>
                        <div class="form-group">
                            <label>Mulai Penawaran<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="start_time_bidding" value="<?php echo e($tahun_akademik->start_time_bidding); ?>">
                        </div>
                        <div class="form-group">
                            <label>Akhir Penawaran<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="end_of_time_bidding" value="<?php echo e($tahun_akademik->end_of_time_bidding); ?>">
                        </div>
                    <input class="btn btn-secondary" type="submit" value="Simpan Data">
                    <a href="/tahun_akademik" class="btn btn-danger">Kembali</a>
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





































<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/Academic_Year/edit.blade.php ENDPATH**/ ?>