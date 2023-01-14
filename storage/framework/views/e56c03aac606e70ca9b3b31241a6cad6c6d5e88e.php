
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
                  <form action="/tahun_akademik/store" method="post">
                    <?php echo e(csrf_field()); ?>

      
                        <div class="form-group">
                            <label>Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="name" placeholder="Masukan Tahun Akademik ..." type="number" name="tahun_akademik" required="required">
                        </div>
                        <div class="form-group ">
                          <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                              <select class="form-control" name="semester" name="group_id" required="required">
                                  <option value="">- Pilih Semester -</option>
                                  <option value="Ganjil" >Ganjil</option>
                                  <option value="Genap" >Genap</option>
                              </select>
                        </div>
                        <div class="form-group">
                          <label>Mulai Input Nilai Mahasiswa<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="datetime-local" name="start_time_value" required="required">
                        </div>
                        <div class="form-group">
                          <label>Akhir Input Nilai Mahasiswa<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="datetime-local" name="end_of_time_value"  required="required">
                        </div>
                        <div class="form-group">
                          <label>Mulai Penawaran<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="datetime-local" name="start_time_bidding" required="required">
                        </div>
                        <div class="form-group">
                          <label>Akhir Penawaran<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="datetime-local" name="end_of_time_bidding" required="required">
                        </div>
                          <input class="btn btn-secondary" type="submit" value="Simpan Data">
                          <a href="/tahun_akademik" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/Academic_Year/create.blade.php ENDPATH**/ ?>