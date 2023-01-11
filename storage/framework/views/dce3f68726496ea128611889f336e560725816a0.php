

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Pengaturan SKS Mahasiswa</h3>
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

                      
                      <form action="/sksmhs" method="post">
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
                              <?php $__currentLoopData = $academikyear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($data->id); ?>">
                                  <?php echo e($data->name); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="angkatan" required="required">
                                <option value="">-  Pilih Angkatan -</option>
                                <?php $__currentLoopData = $generation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>">
                                    <?php echo e($data->name); ?>

                                </option>
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

        <?php 
        $tahun_akademik = $params['tahun_akademik'];
        $angkatan = $params['angkatan'];
        ?>
        
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                  <form action="/sksmhs/store" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="tahun_akademik" value="<?php echo e(($tahun_akademik != null) ? $tahun_akademik->id : null); ?>">
                    <?php if(count($mahasiswa)): ?>
                    <div class="row">
                      <h5>Pengaturan SKS Mahasiswa Angkatan <?php echo e($angkatan->name); ?> Tahun Akademik <?php echo e($tahun_akademik->academic_year); ?>  - Semester <?php echo e(($tahun_akademik->semester )); ?></h5>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input class="btn btn-primary mb-3" type="submit" value="Simpan">
                      </div>
                    </div>
                      <?php endif; ?>
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>SKS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1  ?>
                        <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($no); ?></td>
                          <td><?php echo e($mhs->nim); ?></td>
                          <td><?php echo e($mhs->name); ?></td>
                          <td>
                            <div class="form-group">
                              <input class="form-control" type="number" value="<?php echo e($mhs->sks); ?>" name="sks[<?php echo e($mhs->id); ?>][jumlah_sks]" placeholder="Masukkan SKS ..." required="required">
                              <input type="hidden" name="sks[<?php echo e($mhs->id); ?>][id_sksmhs]" value="<?php echo e($mhs->id_sksmhs); ?>">
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

















  
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kampus\resources\views/prodi/pengaturansks/index.blade.php ENDPATH**/ ?>