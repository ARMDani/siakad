
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>DATA <strong> USER </strong> ISTEK 'Aisyiyah Kendari</h3>
    </div>
  </div>
  
  <div class="content">
    
    <div class="container-fluid">
   
      
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="form">
                  <div class="row">
                    <div class="col">
                      
                      
                      <?php if($errors->has('file')): ?>
                      <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('file')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                      <?php if($sukses = Session::get('sukses')): ?>
                      <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e($sukses); ?></strong>
                      </div>
                      <?php endif; ?>
                      <!-- Import Excel -->
                      <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form method="post" action="/fakultas/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                              </div>
                              <div class="modal-body">
                                <?php echo e(csrf_field()); ?>

                                <label>Pilih file excel</label>
                                <div class="form-group">
                                  <input type="file" name="file" required="required">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  
                  <?php if($tambah = Session::get('tambah')): ?>
                      <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e($tambah); ?></strong>
                      </div>
                  <?php endif; ?>
                  <?php if($edit = Session::get('edit')): ?>
                      <div class="alert alert-primary alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e($edit); ?></strong>
                      </div>
                  <?php endif; ?>
                  <?php if($hapus = Session::get('hapus')): ?>
                      <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e($hapus); ?></strong>
                      </div>
                  <?php endif; ?>
                  
                      
                  <form class="form-inline">
                    <div class="form-group mr-1">
                      <a class="btn btn-success" href="/user">Refresh</a>
                    </div>
                    <div class="form-group mr-1">
                        <a class="btn btn-primary" href="/user/create">Tambah</a>
                    </div>
                </form>
                    <div class="col">
                      <button type="button" class="btn btn-light mr-4 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/fakultas/export_excel" class="btn btn-success ml-5 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                <div class="">
                  <form action="/user/cari" method="GET">
                    <span class="input-group-append">
                      <input class="form-control" type="text" name="cari" placeholder="Cari User .." value="<?php echo e(old('cari')); ?>">
                      <input class="mr-2 for btn btn-light" type="submit" value="CARI">
                    </span>
                  </form>
                </div>
                <table class="table table-bordered table-hover table-wrapper">
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th># Opsi</th>
                  </tr>
                  
                  <?php $no = $pengguna->currentPage() * $pengguna->perPage() -9 ; ?>
                  <?php $__currentLoopData = $pengguna; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penggunas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="text-center">
                    <td><?php echo e($no++); ?></td>
                      <td><?php echo e($penggunas->name); ?></td>
                      <td><?php echo e($penggunas->username); ?></td>
                      <td><?php echo e($penggunas->email); ?></td>
                      <td>
                        <h6 class="text-primary"><?php echo e($penggunas->role->name); ?></h6>
                      </td>
                      <td>
                          <a href="/user/edit/<?php echo e($penggunas->id); ?>" class="btn btn-light"> Edit </a>
                          <a href="/user/hapus/<?php echo e($penggunas->id); ?>"class="btn btn-danger"> Hapus </a>
                          <a href="/user/aktif/<?php echo e($penggunas->id); ?>"class="btn btn-primary"> Aktif </a>
                      </td>
                  </tr>
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
              <br/>
                Halaman : <?php echo e($pengguna->currentPage()); ?> <br/>
                Jumlah Data : <?php echo e($pengguna->total()); ?> <br/>
                Data Per Halaman : <?php echo e($pengguna->perPage()); ?> <br/>
                <?php echo e($pengguna->links()); ?>

           
              </div>
            </div>
          </div>
         
        </div>
      </div>

      

    </div>
    

  </div>
  
 
</div>

<?php $__env->stopSection(); ?>









  















  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/user/index.blade.php ENDPATH**/ ?>