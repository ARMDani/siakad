 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    

    <!-- Messages Dropdown Menu -->
    
    
    <!-- Notifications Dropdown Menu -->
    
    
   
    
    
    <li class="nav-item">
    <li class="nav-link dropdown user user-menu card-bg">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs"><img src="<?php echo e(asset('dist/img/user2-160x160.png')); ?>" class="user-image" alt="User Image"></i></span>
      </a>
      <ul class="dropdown-menu">
        <li class="user-header">
          <img src="<?php echo e(asset('dist/img/user2-160x160.png')); ?>" class="img-circle elevation-2" alt="User Image">
          <h6>
            <?php echo e(Auth::user()->name); ?> <br>
            <small>User since Nov. 2022</small>
          </h6>
          <div class="row">
            <div class="ml-4">
              <a href="#">Profil</a>
            </div>
            <div class="ml-4">
              <a href="#">Bantuan</a>
            </div>
            <div class="ml-4">
              <a href="#">Pengaturan</a>
            </div>
          </div>
        </li>
        <li class="user-footer">
          <div class="pull-righ">
            <a class="btn btn-danger" href="<?php echo e(url('logout')); ?>">Logout <i class="nav-icon fas fa-user"></i></a>
          </div>
        </li>
      </ul>
    </li>
    </li>
  </ul>
  
</nav>
<!-- /.navbar --><?php /**PATH C:\laragon\www\kampus\resources\views/template/header.blade.php ENDPATH**/ ?>