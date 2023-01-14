
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Kartu Hasil Studi</h3>
      </div>
    </div>
    
    <div class="content">
      
      <div class="container-fluid">

        <div class="row">

          
          <div class="col">

            
            <div class="card">
              <div class="card-header"></div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-12">

                      
                      <form action="/khs" method="post">
                        <?php echo e(csrf_field()); ?> 
                        <div class="form-group row">
                          <label for="staticEmail" class="col-2 col-form-label">Program Studi</label>
                          <div class="col-3">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Pendidikan teknologi Informasi">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="tahun_akademik_id" required="required">
                              <option value="">- Pilih Tahun Akademik -</option>
                              <?php $__currentLoopData = $academic_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($data->id==$tahun_akademik): ?>
                              <option selected value="<?php echo e($data->id); ?>">
                                <?php echo e($data->name); ?>

                                </option> 
                              <?php else: ?>
                              <option value="<?php echo e($data->id); ?>">
                                <?php echo e($data->name); ?>

                                </option> 
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="angkatan_id" required="required">
                              <option value="">- Pilih Angkatan -</option>
                              <?php $__currentLoopData = $generations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($data->id==$angkatan): ?>
                              <option selected value="<?php echo e($data->id); ?>">
                                <?php echo e($data->name); ?>

                                </option> 
                              <?php else: ?>
                              <option value="<?php echo e($data->id); ?>">
                                <?php echo e($data->name); ?>

                                </option> 
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          </select>
                         </div>
                         <div class="col">
                           <button type="submit" class="btn btn-success center-block align-bottom ">Refresh</button>
                         </div>
                        </div>
                      </form>
                      
                    
                    </div>
                  </div>
                  
              </div>
            </div>
            

          </div>
          
          

        </div>

    
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                  <form action="/krsmahasiswa/storemahasiswa" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="tahun_akademik" value="">
                    
                    <div class="row">
                      <h5>Kartu Hasil Studi Mahasiswa</h5>
                    </div>
                  
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>KHS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1 ?>
                        <?php $__currentLoopData = $khs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $khss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($no); ?></td>
                          <td><?php echo e($khss->nim); ?></td>
                          <td><?php echo e($khss->name); ?></td>
                          <td>
                            <div class="form-group">
                              <div class="">
                                <button type="button" class="btn btn-secondary">Lihat KHS</button>
                              </div>
                            </div>
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

















  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/prodi/khs/index.blade.php ENDPATH**/ ?>