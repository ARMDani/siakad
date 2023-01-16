
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data User</h3>
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
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="code_faculty"placeholder="Masukkan Nama ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Username<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Username ..." type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                          <label>Password<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="password" name="password"  placeholder="Masukkan Password..." />
                        </div>
                        <div class="form-group">
                          <label>Email<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="email" name="email" placeholder="Masukan Email..." type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                          <label>User<span class="required" style="color: #dd4b39;">*</span></label>
                          <select class="form-control" name="roles" required="required">
                              <option value="">- Pilih Roles -</option>
                              <?php $__currentLoopData = $roles_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id); ?>">
                                  <?php echo e($data->name); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          </select>
                        </div>
                            <input class="btn btn-success" type="submit" value="Simpan Data">
                            <a href="/user" class="btn btn-light">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/user/create.blade.php ENDPATH**/ ?>