
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Fakultas</h3>
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
                      
                      
                      
                      <?php if($tambah = Session::get('sukses')): ?>
                      <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e($tambah); ?></strong>
                      </div>
                      <?php endif; ?>
                      <!-- Import Excel -->
                      <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import data fakultas</h5>
                              </div>
                              <div class="modal-header">
                                <p>File harus format exel, serta penulisanya disesuai dengan tabel</p>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                              </div>
                              <form method="post" action="/fakultas/import_excel" enctype="multipart/form-data">
                              <div class="modal-body">
                                <?php echo e(csrf_field()); ?>

                                <label>Pilih file</label>
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
                  
                  <?php if($import = Session::get('import')): ?>
                      <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e($import); ?></strong>
                      </div>
                  <?php endif; ?>
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
                  
              
              <div class="row">
                <div class="col-1">
                  <form action="/fakultas/create" method="get">
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-primary" ><i class="fas fa-plus"></i></button>
                    <a class="btn btn-success" href="/fakultas"><i class="fas fa-redo-alt"></i></a>
                  </form>
                </div>
                <div class="col-2" >
                  <a class="nav-link" data-widget="navbar-search" href="#">
                    <i class="fas fa-search"></i>
                  </a>
                  <div class="navbar-search-block">
                    <form class="form-inline" action="/fakultas/cari" method="GET">
                      <div class="input-group input-group-sm">
                        <input class="form-control" type="text" name="cari" placeholder="Cari Data fakultas ..."  value="<?php echo e(old('cari')); ?>">
                        <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit" value="CARI">
                            <i class="fas fa-search"></i>
                          </button>
                          <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-9">
                  <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel"> <i class="fas fa-file-import"></i> </button>
                  <a href="/fakultas/export_excel" class="btn btn-success mr-3 float-right" target="_blank"> <i class="fas fa-file-export"></i> </a>
                </div>
              </div>
              

                <table class="table table-bordered table-hover table-wrapper">
                  <tr class="text-center">
                    <th>No</th>
                    <th>Code</th>
                    <th>Fakultas</th>
                    <th>Opsi</th>
                  </tr>
                  <?php $no = $faculty->currentPage() * $faculty->perPage() -9 ; ?>
                  <?php $__currentLoopData = $faculty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td class="text-center"><?php echo e($no); ?></td>
                      <td class="text-center"><?php echo e($facultys->code_faculty); ?></td>
                      <td><?php echo e($facultys->name); ?></td>
                      <td class="text-center">
                          <a href="/fakultas/edit/<?php echo e($facultys->id); ?>"class="btn btn-secondary"> <i class="fas fa-edit"></i> </a>
                          <a href="/fakultas/hapus/<?php echo e($facultys->id); ?>"class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i> </a>
                      </td>
                  </tr>
                  <?php $no++ ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
              <br/>
              <div class="row">
                <div class="col-10">
                  Halaman : <?php echo e($faculty->currentPage()); ?> <br/>
                  Jumlah Data : <?php echo e($faculty->total()); ?> <br/>
                  Data Per Halaman : <?php echo e($faculty->perPage()); ?>

                </div>
                <div class="col">
                  <?php echo e($faculty->links()); ?>

                </div>
              </div>
                
                
           
              </div>
            </div>
          </div>
         
        </div>
      </div>

      

    </div>
    

  </div>
  
 
</div>

<?php $__env->stopSection(); ?>









  















  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/faculty/index.blade.php ENDPATH**/ ?>