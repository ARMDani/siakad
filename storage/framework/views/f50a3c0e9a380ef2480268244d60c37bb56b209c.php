

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Penginputan Nilai Mahasiswa</h3>
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

                      
                      <form action="/nilai" method="post">
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
                  <form action="/nilai/store" method="post">
                    <?php echo e(csrf_field()); ?>

                  <?php if(count($mahasiswa)): ?>
                    <div class="row">
                        <?php $__currentLoopData = $academic_year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->id==Request::segment(3)): ?> 
                        <h1 selected value="<?php echo e($data->id); ?>">
                          <?php echo e($data->name); ?>

                          </h1> 
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    <div class="row">
                      <div class="col">
                      
                      <?php endif; ?>
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead class="text-center">
                        <tr>
                          <th>Opsi</th>
                          <th>No</th>
                          <th>Kode MK</th>
                          <th>Mata Kuliah</th>
                          <th>JML Mahasiswa</th>
                          <th>SKS</th>
                          <th>Ruangan</th>
                          <th>Semester</th>
                          <th>Jam Kuliah</th>
                          <th>Dosen Pengajar</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <?php $no = 1  ?>
                        <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mhs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td> 
                              <div class="col">
                                <a href="/nilai/input_nilai/<?php echo e($mhs->subject_course->id); ?>" type="submit" class="btn btn-success center-block align-bottom " value="Input Nilai">Input Nilai</a>
                              </div>
                          </td> 
                          <td><?php echo e($no); ?></td>
                          <td><?php echo e($mhs->subject_course->course_code); ?></td>
                          <td><?php echo e($mhs->subject_course->name); ?></td>
                          <td>
                            <div class="col">
                              <button type="submit" class="btn btn-success center-block align-bottom "><?php echo e($mhs->jumlah); ?></button>
                            </div>
                          </td>
                          <td><?php echo e($mhs->subject_course->sk); ?></td>
                          <td><?php echo e($mhs->academic_room->name); ?></td>
                          <td><?php echo e($mhs->subject_course->sk); ?></td>
                          <td><?php echo e($mhs->academic_room->name); ?></td>  
                          <td><?php echo e($mhs->lecturer->name); ?></td>                           
                         
                         
                        </tr>
                        <?php $no++ ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>
                      </tbody>
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
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/prodi/input_nilai/index.blade.php ENDPATH**/ ?>