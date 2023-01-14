
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
                <li class="breadcrumb-item active">Data Ruangan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="container">
            <div class="card-body">
              <h3>Data Ruangan</h3>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="/ruangan/create">
                  <button href="" type="button" class="btn btn-success">Tambah Data</button>
                </a>
                <button type="button" class="btn btn-outline-warning">Export</button>
                <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                <li>
                  <div class="input-group mb-12">
                    <form action="/ruangan/cari" method="GET">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Data Fakultas .." value="<?php echo e(old('cari')); ?>">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                </li>
              </div>
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12 col-md-4">
                            <div class="dt-buttons btn-group flex-wrap mt-5">
                            </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="container-fuild">
                <table class="table table-bordered table-hover table-wrapper">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kode Ruangan</th>
                      <th>Opsi</th>
                    </tr>
                    <?php $no = $rooms->currentPage() * $rooms->perPage() -9 ; ?>
                    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($no); ?></td>
                        <td><?php echo e($room->name); ?></td>
                        <td><?php echo e($room->code_room); ?></td>
                        <td>
                            <a href="/ruangan/edit/<?php echo e($room->id); ?>" class="btn btn-secondary"> Edit </a>
                            <a href="/ruangan/hapus/<?php echo e($room->id); ?>"class="btn btn-danger"> Hapus </a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <br/>
                Halaman : <?php echo e($rooms->currentPage()); ?> <br/>
                Jumlah Data : <?php echo e($rooms->total()); ?> <br/>
                Data Per Halaman : <?php echo e($rooms->perPage()); ?> <br/>
                <?php echo e($rooms->links()); ?>

              </div>
            </div>
        </div><!-- /.container-fluid -->
      </div>
                  </div>
    </div>
</div>
<?php $__env->stopSection(); ?>









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/room/index.blade.php ENDPATH**/ ?>