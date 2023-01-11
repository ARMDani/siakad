

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Pengaturan</h3>
    </div>
  </div>

  
  <div class="content">

    
    <div class="container-fluid">
   
      
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="form">
                <form action="/student/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                  <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                        <label class=" control-label">Logo Kampus<span class="required" style="color: #dd4b39;">*</span></label>
                        <div class="">
                            <input lass="form-control" type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="" accept=".png, .jpeg, .jpg" required="required">
                            <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Nama Aplikasi<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="name" value="">
                      </div>
                      <div class="form-group">
                          <label>Copyright<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="number" required="required" name="nim" value="">
                      </div>
                      <div class="form-group">
                        <label>Nama Kampus<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text-area" required="required" name="name" value="">
                      </div>
                      <div class="form-group">
                        <label>Alamat Kampus<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text-area" required="required" name="name" value="">
                      </div>
                      <div class="form-group">
                        <label>Email<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="">
                      </div>
                      <div class="form-group">
                        <label>No. Telepon<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="">
                      </div>
                  <input class="btn btn-success" type="submit" value="Simpan Data">
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









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/setting/index.blade.php ENDPATH**/ ?>