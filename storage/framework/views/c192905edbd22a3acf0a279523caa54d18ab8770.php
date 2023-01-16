
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Dosen</h3>
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
                          <form method="post" action="/leacture/import_excel" enctype="multipart/form-data">
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
                  
                <form action="/leacture/create" method="get">
                  <?php echo e(csrf_field()); ?>


                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/leacture/export_excel" class="btn btn-success mr-3 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                  <div class="input-group mb-3 col-12" >
                    <form action="/leacture/cari" method="GET">
                      <span class="input-group-append">
                        <input class="col-12" type="text" name="cari" placeholder="Cari Mata Kuliah .." value="<?php echo e(old('cari')); ?>">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                <table class="table table-bordered table-hover table-wrapper">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Program Studi</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  <?php $no = $leacture->currentPage() * $leacture->perPage() -9 ; ?>
                  <?php $__currentLoopData = $leacture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leactures): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($no); ?></td>
                    <td><?php echo e($leactures->name); ?></td>
                    <td><?php echo e($leactures->nidn); ?></td>
                    <td><?php echo e($leactures->study_program->name); ?></td>
                    <td><?php echo e($leactures->gender); ?></td>
                    <td><?php echo e($leactures->religion); ?></td>
                    <td><?php echo e($leactures->address); ?></td>
                    <td>
                        <img src="<?php echo e(url('public/Image/'.$leactures->photo)); ?>"
                        style="width: 150px;">
                    </td>
                    <td >
                      <a href="/leacture/edit/<?php echo e($leactures->id); ?>" class="btn btn-secondary"> Edit </a>
                      <a href="/leacture/hapus/<?php echo e($leactures->id); ?>"class="btn btn-danger"> Hapus </a>
                    </td>
                  </tr>
                  <?php $no++ ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
              <br/>
                Halaman : <?php echo e($leacture->currentPage()); ?> <br/>
                Jumlah Data : <?php echo e($leacture->total()); ?> <br/>
                Data Per Halaman : <?php echo e($leacture->perPage()); ?> <br/>
                <?php echo e($leacture->links()); ?>

           
              </div>
            </div>
          </div>
         
        </div>
      </div>

      

    </div>
    

  </div>
  
 
</div>


<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/leacture/index.blade.php ENDPATH**/ ?>