

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    
    
    <div class="content">

      
      <div class="container-fluid">
        <div class="row">            
             
              <div class="card-body col-12">
                <h3>Penginputan Nilai Mahasiswa Mata Kuliah</h3> 
              </div>
            </div>
          
          </div>
          

        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                 
                    <div class="row">
                     </div>
                    <div class="row">
                      <div class="col">
                        <a href="/nilai" class="btn btn-danger mb-3" type="submit">Kembali</a>
                      </div>
                    </div>
                      
                      <table class="table table-bordered table-hover table-wrapper">
                        <thead>
                          <tr>
                            <th class="tg-6h95" rowspan="4">No</th>
                            <th class="tg-6h95" rowspan="4">Nim</th>
                            <th class="tg-6h95" rowspan="4">Nama</th>
                            <th class="tg-k7qf text-center" colspan="18">Nilai</th>
                          </tr>
                          <tr class="ng-light">
                            <td class="tg-k7qf">Tugas</td>
                            <td class="tg-k7qf">UTS</td>
                            <td class="tg-k7qf">UAS</td>
                            <td class="tg-k7qf">Grade</td>
                          </tr>
                        </thead>
                        <tbody>

                          <form action="/nilai/store/<?php echo e(Request::segment(3)); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                          
                    
                        <?php $__empty_1 = true; $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $no = 1  ?>
                          <tr>
                            <input type="hidden" class="nilai" name="id[]" value="<?php echo e(old('id') ? old('id') : $item->id); ?>">
                            <td><?php echo e($no); ?></td>
                            <td class="tg-3xi5"><?php echo e($item->student->nim); ?></td>
                            <td class="tg-3xi5"><?php echo e($item->student->name); ?></td>
                           <td class="tg-3xi5">
                              <input type="number" class="nilai" name="assignment_value[]" value="<?php echo e(old('assignment_value') ? old('assignment_value') : $item->assignment_value); ?>">
                            </td>
                            <td class="tg-3xi5">
                              <input type="number" class="nilai" name="uts_value[]" value="<?php echo e(old('uts_value') ? old('uts_value') : $item->uts_value); ?>">
                            </td>
                            <td class="tg-3xi5">
                              <input type="number" class="nilai" name="uas_value[]" value="<?php echo e(old('uas_value') ? old('uas_value') : $item->uas_value); ?>">
                            </td>
                            <td class="tg-3xi5"><?php echo e(($item->grade_id == null) ? "-" : $item->grade->name); ?></td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                            <td>
                              Mahasiswa Belum Mengambil KRS
                            </td>
                          </tr>
                          <?php $no++ ?>
                          <?php endif; ?>
                        </tbody>
                  
                      </table>
                      <div class="d-flex">
                        <button type="submit" class="btn btn-success ml-auto">Simpan Nilai</button>
                      </div>
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

















  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/prodi/input_nilai/input_nilai.blade.php ENDPATH**/ ?>