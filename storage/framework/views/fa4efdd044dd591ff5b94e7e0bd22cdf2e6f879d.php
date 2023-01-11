
<?php $__env->startSection('content'); ?>

<style type="text/css">
  .pagination li{
    float: left;
    list-style-type: none;
    margin:5px;
  }
</style>
<div class="content-wrapper">
              <div class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                            <li class="breadcrumb-item active">Data Dosen</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="card-body">
                        <div class="card-body">
                          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                              <div class="col-sm-12 col-md-4">
                                <div class="dt-buttons btn-group flex-wrap mt-5">
                                  <h3>Data Dosen</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/leacture/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          <form action="/leacture/cari" method="GET">
                            <input type="text" class="form-control rounded-0">
                              <span class="input-group-append">
                                <input class="input-group mb-3" type="text" name="cari" placeholder="Cari Data Dosen .." value="<?php echo e(old('cari')); ?>">
                                <button type="submit" class="btn btn-success" value="CARI">Cari!</button>
                              </span>
                          </form>
                        <div class="container-fuild">
                            <table class="table table-bordered table-hover table-wrapper">
                                <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>NIDN</th>
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
<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/leacture/index.blade.php ENDPATH**/ ?>