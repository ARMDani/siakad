 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="<?php echo e(asset('dist/img/02.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"> <b>SIASTEK 'AISYIYAH</b> </span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo e(asset('dist/img/user2-160x160.png')); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar text-dark bg-light" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
    <?php if(Auth::user()->role->id == 1): ?>    
    
    <li class="nav-header">ADMIN</li>
    <li class="nav-item menu-open">
      <a href="/home" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
    </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/fakultas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Fakultas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/prodi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Prodi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/kelas" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kelas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/ruangan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ruangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/matakuliah" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Mata Kuliah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/leacture" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/student" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Mahasiswa<p>
              </a>
            </li>
          </ul>
        <li class="nav-item">
          <a href="/tahun_akademik" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Tahun Akademik
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/nilai_grade" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Grade
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">4</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/user" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Administrator</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Prodi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mahasiswa</p>
              </a>
            </li>
          </ul>
        <li class="nav-item">
          <a href="/pengaturan" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pengaturan
            </p>
          </a>
        </li>
        
        <?php endif; ?>

        <?php if(Auth::user()->role->id == 2): ?>
        <li class="nav-header">PRODI</li>
        <li class="nav-item menu-open">
          <a href="/home" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/leacture" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dosen
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/student" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Mahasiswa
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/matakuliah" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Mata Kuliah
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Akademik
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/penjadwalan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penjadwalan Kuliah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/sksmhs" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengaturan SKS Mhs.</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/krs" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kartu Rencana Studi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/khs" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kartu Hasil Studi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/nilai" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Nilai</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transkip Nilai<small>+ Custom Area</small></p>
              </a>
          </ul>
        </li>
        
        <?php endif; ?>

        <?php if(Auth::user()->role->id == 3): ?>
        
        <li class="nav-header">DOSEN</li>
        <li class="nav-item menu-open">
          <a href="/home" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#MahasiswaPerwalian" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Mahasiswa Perwalian
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/lecturedsn" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Jadwal Mengajar
            </p>
          </a>
        </li>
  

  <?php endif; ?>

  <?php if(Auth::user()->role->id == 4): ?>
  
  <li class="nav-header">MAHASISWA</li>
  <li class="nav-item menu-open">
    <a href="/home" class="nav-link active">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/krsmahasiswa" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Kartu Rencana Studi
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="/khsmahasiswa" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Kartu Hasil Studi
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Transkip Nilai
      </p>
    </a>
  </li>

  <?php endif; ?>
       
</li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?php /**PATH C:\Users\Windows 10\Documents\Technos Studio\siakad\resources\views/template/sidebar.blade.php ENDPATH**/ ?>