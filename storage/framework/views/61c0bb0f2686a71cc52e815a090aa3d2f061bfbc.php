
<?php $__env->startSection('content'); ?>
<html>
    <head>
        <title>Edit data Dosen</title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Dosen</h3>
                            <?php $__currentLoopData = $leacture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leactures): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <form action="/leacture/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($leactures->id); ?>"> <br/>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="name" value="<?php echo e($leactures->name); ?>">
                                </div>
                                <div class="form-group">
                                    <label>NIDN<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="number" required="required" name="nidn" value="<?php echo e($leactures->nidn); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="gender" value="<?php echo e($leactures->gender); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="religion" value="<?php echo e($leactures->religion); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="address" value="<?php echo e($leactures->address); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Foto<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="file" required="required" name="photo" value="<?php echo e($leactures->photo); ?>"> 
                                </div>
                               
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/leacture" class="btn btn-danger">Kembali</a>
                            </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/admin/leacture/edit.blade.php ENDPATH**/ ?>