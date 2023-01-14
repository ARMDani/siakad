

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Kartu Hasil Studi</p>
    <div class="row">   
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="/khsmahasiswa" method="post">
              <?php echo e(csrf_field()); ?> 
              <div class="form-group row">
                <div class="card col-5" style="width: 18rem;">
                 
                  <ul class="list-group list-group-flush">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item"><b>NIM : </b> <?php echo e($datas->student->nim); ?></li>
                    <li class="list-group-item"><b>Nama : </b> <?php echo e($datas->student->name); ?></li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> <?php echo e($datas->student->study_program->name); ?></li>
                    <?php break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                <li class="list-group ml-2"> 
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
              </li>
            </ul>
            <br>
            <button type="submit" class="btn btn-primary" >Refresh</button>
          </form>
          </div>

            <input type="hidden" name="tahun_akdemik" value="<?php echo e($tahun_akademik); ?>">
        </div>
      </div>
    </div>        
      


 <div class="col-12">  
 <div class="card">
 <div class="card-body">
  <div>
  <a href="#" class="btn btn-success">Cetak KHS</a> 
</div>  
<br> 
    <form action="/khsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <?php echo e(csrf_field()); ?>

        <table class="table table-bordered table-hover table-wrapper">
          <thead>
            <tr>
              <th class="tg-6h95  text-center" rowspan="2">No</th>
              <th class="tg-6h95  text-center" rowspan="2">Kode</th>
              <th class="tg-6h95  text-center" rowspan="2" >Mata Kuliah</th>
              <th class="tg-6h95  text-center" rowspan="2">SKS</th>
              <th class="tg-k7qf text-center" colspan="18">Nilai</th>
            </tr>
            <tr>
              <td class="tg-k7qf  text-center">Huruf</td>
              <td class="tg-k7qf  text-center">Bobot</td>
              <td class="tg-k7qf  text-center">Nilai</td>
            </tr>
          </thead>
            <?php $no = 1  ?>
            <?php $__currentLoopData = $khsmahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $khsmahasiswas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr >
              <td class="tg-3xi5 text-center"><?php echo e($no); ?></td>
              <td class="tg-3xi5 text-center"><?php echo e($khsmahasiswas->lecture_schedulings->subject_course->course_code); ?></td>
              <td class="tg-3xi5 text-center"><?php echo e($khsmahasiswas->lecture_schedulings->subject_course->name); ?></td>
              <td class="text-center"><?php echo e($khsmahasiswas->lecture_schedulings->subject_course->sk); ?></td>
              <td class="text-center"><?php echo e($khsmahasiswas->lecture_schedulings->academic_year->semester); ?></td>
              <td class="text-center"><?php echo e($khsmahasiswas->lecture_schedulings->start_time); ?></td>
              <td class="text-center"><?php echo e($khsmahasiswas->lecture_schedulings->hour_over); ?></td>
          </tr>
            <?php $no++ ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </form>
  </div>
 </div>
</div>
</div>
</div>
        <!-- /.card-body -->
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/mahasiswa/khs/indexmhs.blade.php ENDPATH**/ ?>