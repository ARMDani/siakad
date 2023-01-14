

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Grade Nilai</h3>
    </div>
  </div>

  
  <div class="content">

    
    <div class="container-fluid">
   
      
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="form">
                
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
                
                <form action="/nilai_grade/create" method="get">
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
                        <th>Grade</th>
                        <th>Bobot</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($no); ?></td>
                        <td><?php echo e($nilai->name); ?></td>
                        <td><?php echo e($nilai->bobot); ?></td>
                        <td><?php echo e($nilai->poin); ?></td>
                        <td><?php echo e($nilai->keterangan); ?></td>
                        <td>
                          <a href="/nilai_grade/edit<?php echo e($nilai->id); ?>" type="button" class="btn btn-warning">Edit</a>
                          <a href="/nilai_grade/hapus/<?php echo e($nilai->id); ?>" type="button" class="btn btn-danger">Hapus</a>
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









  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/admin/grade/index.blade.php ENDPATH**/ ?>