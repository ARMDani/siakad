

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
              <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                                  <h3>Data Mahasiswa</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/student/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <form action="/student/cari" method="GET">
                      <input type="text" class="form-control rounded-0">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Mahasiswa .." value="<?php echo e(old('cari')); ?>">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                  <div class="container-fuild">
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
                        <?php $no = $students->currentPage() * $students->perPage() -9 ; ?>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($no); ?></td>
                            <td><?php echo e($student->name); ?></td>
                            <td><?php echo e($student->nim); ?></td>
                            <td><?php echo e($student->gender); ?></td>
                            <td><?php echo e($student->religion); ?></td>
                            <td><?php echo e($student->study_program->name); ?></td>
                            <td><?php echo e($student->districts->name); ?></td>
                            <td><?php echo e($student->class->name); ?></td>
                            <td><?php echo e($student->generations->name); ?></td>
                            <td>
                              <img src="<?php echo e(url('public/Image/'.$student->photo)); ?>"
                              style="width: 150px;">
                            </td>
                            <td>
                                <a href="/student/edit/<?php echo e($student->id); ?>" class="btn btn-secondary"> Edit </a>
                                <a href="/student/hapus/<?php echo e($student->id); ?>"class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <br/>
                    Halaman : <?php echo e($students->currentPage()); ?> <br/>
                    Jumlah Data : <?php echo e($students->total()); ?> <br/>
                    Data Per Halaman : <?php echo e($students->perPage()); ?> <br/>
                    <?php echo e($students->links()); ?>

                  </div>
        </div>
    </div>
</div>      
<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/student/index.blade.php ENDPATH**/ ?>