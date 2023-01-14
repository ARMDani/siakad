
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Fakultas</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <form action="/fakultas/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="code_faculty"placeholder="Masukkan Code ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Nama ..." type="text" name="name" required="required">
                        </div>

             

                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/fakultas" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/faculty/create.blade.php ENDPATH**/ ?>