

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
                  <form action="/nilai/store" method="post">
                    <?php echo e(csrf_field()); ?>

                      
                    <div class="row">
                     </div>
                    <div class="row">
                      <div class="col">
                        <a href="/nilai" class="btn btn-danger mb-3" type="submit">Kembali</a>
                      </div>
                    </div>
                      
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead>
                        <tr class="text-center">
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Nilai Tugas</th>
                          <th>UTS</th>
                          <th>UAS</th>
                          <th>Grade</th>
                          <th>#Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1  ?>
                        <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($no); ?></td>
                          <td><?php echo e($mhs->student->nim); ?></td>
                          <td><?php echo e($mhs->student->name); ?></td>
                        </td>
                        <td>  
                          <input class="form-control" type="number" value="<?php echo e($mhs->assignment_value); ?>" name="nilai[<?php echo e($mhs->id); ?>][assignment_value]" placeholder="Masukkan nilai ..." required="required">
                          <input type="hidden" name="id_nilaimhs" value="<?php echo e($mhs->student_id); ?>">
                          <input type="hidden" name="jadwal" value="<?php echo e($mhs->lecture_schedulings_id); ?>">
                          <input type="hidden" name="matakuliah" value="<?php echo e($matakuliah); ?>">

                        </td>
                        <td>
                          <input class="form-control"  type="number" value="<?php echo e($mhs->uts_value); ?>" name="nilai[<?php echo e($mhs->id); ?>][uts_value]" placeholder="Masukkan nilai ..." required="required">
                       
                        </td>
                        <td>
                          <input class="form-control" type="number" value="<?php echo e($mhs->uas_value); ?>" name="nilai[<?php echo e($mhs->id); ?>][uas_value]" placeholder="Masukkan nilai ..." required="required">
                          <input type="hidden" name="nilai[<?php echo e($mhs->id); ?>][id_nilaimhs]" value="<?php echo e($mhs->id_nilaimhs); ?>">
                        </td>
                      <td>
                        <button class="btn btn-success center-block align-bottom " placeholder="..."><?php echo e(($mhs->grade!=null)?$mhs->grade->name: " "); ?></button>
                      </td>
                      <td>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                           
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

















  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/prodi/input_nilai/input_nilai.blade.php ENDPATH**/ ?>