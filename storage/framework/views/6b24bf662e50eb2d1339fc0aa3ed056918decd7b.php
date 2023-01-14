
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Dosen</h3>
      </div>
    </div>
  
    
    <div class="content">
  
      
      <div class="container-fluid">
     
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    <form action="/leacture/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Nama ..." type="number" name="name" required="required">
                        </div>
                        <div class="form-group">
                            <label>NIDN<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="nidn"placeholder="Masukkan NIDN ..." required="required">
                        </div>
                        <div class="form-group ">
                            <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="gender" required="required">
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <option value="1" >Laki-Laki</option>
                                    <option value="0" >Perempuan</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="religion" required="required">
                                <option value="">- Pilih Agama -</option>
                                <option value="1" >Islam</option>
                                <option value="0" >Hindu</option>
                                <option value="1" >Kristen</option>
                                <option value="1" >Katolik</option>
                                <option value="1" >Budha</option>
                                <option value="1" >Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="address"placeholder="Masukkan Alamat ..." required="required">
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Photo<span class="required" style="color: #dd4b39;">*</span></label>
                            <div class="">
                                <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="" accept=".png, .jpeg, .jpg" required="required">
                                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                            </div>
                        </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/leacture" class="btn btn-danger">Kembali</a>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/leacture/create.blade.php ENDPATH**/ ?>