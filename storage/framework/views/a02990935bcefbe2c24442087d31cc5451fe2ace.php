
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Program Studi</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <form action="/prodi/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="code_prodi"placeholder="Masukkan Code ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Nama ..." type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                                <label>Fakultas<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="study_faculty" required="required">
                                    <option value="">- Pilih Fakultas -</option>
                                    <?php $__currentLoopData = $study_faculty_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>">
                                        <?php echo e($data->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </select>
                            	</div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/prodi" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/studi_program/create.blade.php ENDPATH**/ ?>