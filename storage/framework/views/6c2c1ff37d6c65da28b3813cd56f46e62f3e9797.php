

<?php $__env->startSection('content'); ?>
<style type="text/css">
  .pagination li{
    float: left;
    list-style-type: none;
    margin:5px;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Data Mata Kuliah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="card-body">
                  <div class="card-body">
                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="dt-buttons btn-group flex-wrap mt-5">
                                  <h3>Data Mata Kuliah</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/matakuliah/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <form action="/matakuliah/cari" method="GET">
                      <input type="text" class="form-control rounded-0">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Mata Kuliah .." value="<?php echo e(old('cari')); ?>">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                  <div class="container-fuild">
                    <table class="table table-bordered table-hover table-wrapper">
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Mata Kuliah</th>
                          <th>SKS</th>
                          <th>Semester</th>
                          <th>Dosen</th>
                          <th>Opsi</th>
                        </tr>
                        <?php $no = $course->currentPage() * $course->perPage() -9 ; ?>
                        <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no); ?></td>
                            <td><?php echo e($courses->course_code); ?></td>
                            <td><?php echo e($courses->name); ?></td>
                            <td><?php echo e($courses->sk); ?></td>
                            <td><?php echo e($courses->semester); ?></td>
                            <td><?php echo e($courses->lecturer->name); ?></td>
                            <td >
                                <a href="/matakuliah/edit/<?php echo e($courses->id); ?>" class="btn btn-secondary"> Edit </a>
                                <a href="/matakuliah/hapus/<?php echo e($courses->id); ?>"class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <br/>
                    Halaman : <?php echo e($course->currentPage()); ?> <br/>
                    Jumlah Data : <?php echo e($course->total()); ?> <br/>
                    Data Per Halaman : <?php echo e($course->perPage()); ?> <br/>
                    <?php echo e($course->links()); ?>

                  </div>
        </div>
    </div>
</div>      
<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/subject_course/index.blade.php ENDPATH**/ ?>