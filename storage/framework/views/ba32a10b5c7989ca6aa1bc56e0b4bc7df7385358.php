
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Program Studi</h3>
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
                          <form method="post" action="/prodi/import_excel" enctype="multipart/form-data">
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
                <form action="/prodi/create" method="get">
                  <?php echo e(csrf_field()); ?>


                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/prodi/export_excel" class="btn btn-success mr-3 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                  <div class="input-group mb-3 col-12" >
                    <form action="/prodi/cari" method="GET">
                      <span class="input-group-append">
                        <input class="col-12" type="text" name="cari" placeholder="Cari Fakultas .." value="<?php echo e(old('cari')); ?>">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                <table class="table table-bordered table-hover table-wrapper">
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Prodram Studi</th>
                    <th>Fakultas</th>
                    <th>Opsi</th>
                  </tr>
                  <?php $no = $prodi->currentPage() * $prodi->perPage() -9 ; ?>
                  <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($no); ?></td>
                      <td><?php echo e($prodis->code_prodi); ?></td>
                      <td><?php echo e($prodis->name); ?></td>
                      <td><?php echo e($prodis->study_faculty->name); ?></td>
                      <td>
                          <a href="/prodi/edit/<?php echo e($prodis->id); ?>" class="btn btn-secondary"> Edit </a>
                          <a href="/prodi/hapus/<?php echo e($prodis->id); ?>"class="btn btn-danger"> Hapus </a>
                      </td>
                  </tr>
                  <?php $no++ ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
              <br/>
                Halaman : <?php echo e($prodi->currentPage()); ?> <br/>
                Jumlah Data : <?php echo e($prodi->total()); ?> <br/>
                Data Per Halaman : <?php echo e($prodi->perPage()); ?> <br/>
                <?php echo e($prodi->links()); ?>

           
              </div>
            </div>
          </div>
         
        </div>
      </div>

      

    </div>
    

  </div>
  
 
</div>

<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/studi_program/index.blade.php ENDPATH**/ ?>