

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Tahun Akademik</h3>
    </div>
  </div>

  
  <div class="content">

    
    <div class="container-fluid">
   
      
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="form">
                <form action="/tahun_akademik/create" method="get">
                  <?php echo e(csrf_field()); ?>

          
                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                  </div>
                  <table class="table table-bordered table-hover table-wrapper">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun Akademik</th>
                        <th>Semester</th>
                        <th>Jadwal Input Nilai Semester Mahasiswa</th>
                        <th>Jadwal Penawaran Mata Kuliah</th>
                        <th>Status</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      <?php $__currentLoopData = $ta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun_akademik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($no); ?></td>
                        <td><?php echo e($tahun_akademik->name); ?></td>
                        <td><?php echo e($tahun_akademik->semester); ?></td>
                        <td><?php echo e($tahun_akademik->start_time_value . " Sampai " .$tahun_akademik->end_of_time_value); ?></td>
                        <td><?php echo e($tahun_akademik->start_time_bidding ." Sampai ". $tahun_akademik->end_of_time_bidding); ?></td>
                        <td><?php echo e(($tahun_akademik->active == "Y") ? "Aktif" : "Tidak Aktif"); ?></td>
                        <td>
                          <a href="/tahun_akademik/active/<?php echo e($tahun_akademik->id); ?>/Y" type="button" class="btn btn-success">Aktif</a>
                          <a href="/tahun_akademik/active/<?php echo e($tahun_akademik->id); ?>/N" type="button" class="btn btn-danger">Tidak Aktif</a>
                          <a href="/tahun_akademik/edit<?php echo e($tahun_akademik->id); ?>" type="button" class="btn btn-warning">Edit</a>
                        </td>
                      </tr>
                      <?php $no++ ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
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









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/Academic_Year/index.blade.php ENDPATH**/ ?>