
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Mahasiswa</h3>
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
                          <form method="post" action="/student/import_excel" enctype="multipart/form-data">
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
                  
                <form action="/student/create" method="get">
                  <?php echo e(csrf_field()); ?>


                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/student/export_excel" class="btn btn-success mr-3 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                  <div class="input-group mb-3 col-12" >
                    <form action="/student/cari" method="GET">
                      <span class="input-group-append">
                        <input class="col-12" type="text" name="cari" placeholder="Cari Mahasiswa .." value="<?php echo e(old('cari')); ?>">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                <table class="table table-bordered table-hover table-wrapper">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Program Studi</th>
                    <th>Asal Daerah</th>
                    <th>Kelas</th>
                    <th>Angkatan</th>
                    <th>Photo</th>
                    <th>Opsi</th>
                  </tr>
                  <?php $no = $student->currentPage() * $student->perPage() -9 ; ?>
                  <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($no); ?></td>
                    <td><?php echo e($students->name); ?></td>
                    <td><?php echo e($students->nim); ?></td>
                    <td><?php echo e($students->gender); ?></td>
                    <td><?php echo e($students->religion); ?></td>
                    <td><?php echo e($students->study_program->name); ?></td>
                    <td><?php echo e($students->districts->name); ?></td>
                    <td><?php echo e($students->class->name); ?></td>
                    <td><?php echo e($students->generations->name); ?></td>
                    <td>
                      <img src="<?php echo e(url('public/Image/'.$students->photo)); ?>"
                      style="width: 150px;">
                    </td>
                    <td>
                        <a href="/student/edit/<?php echo e($students->id); ?>" class="btn btn-secondary"> Edit </a>
                        <a href="/student/hapus/<?php echo e($students->id); ?>"class="btn btn-danger"> Hapus </a>
                    </td>
                  </tr>
                  <?php $no++ ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
              <br/>
                Halaman : <?php echo e($student->currentPage()); ?> <br/>
                Jumlah Data : <?php echo e($student->total()); ?> <br/>
                Data Per Halaman : <?php echo e($student->perPage()); ?> <br/>
                <?php echo e($student->links()); ?>

           
              </div>
            </div>
          </div>
         
        </div>
      </div>

      

    </div>
    

  </div>
  
 
</div>

<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/student/index.blade.php ENDPATH**/ ?>