 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{ asset('dist/img/02.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"> <b>SIASTEK 'AISYIYAH</b> </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
    @if (Auth::user()->role->id == 1)    
    {{-- ---------------------mulai admin--------------------------- --}}
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
                <p> Data Mahasiswa <p>
              </a>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/tahun_akademik" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Tahun Akademik
              
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              User
              
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Pengaturan
            
            </p>
          </a>
        </li>
        {{-- -----------------------batas admin------------------------}}
        @endif

        @if (Auth::user()->role->id == 2)
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
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/student" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Mahasiswa
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/matakuliah" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Mata Kuliah
              <span class="right badge badge-danger">New</span>
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
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kartu Hasil Studi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
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
        {{-- --------------------------batas prodi----------------------------------}}
        @endif

        @if (Auth::user()->role->id == 3)
        {{-- ---------------------------------mulai dosen------------------------------ --}}
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
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Mahasiswa Perwalian
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Jadwal Mengajar
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
  {{-- // ----------------------------batas dosen-------------------------------  --}}

  @endif

  @if (Auth::user()->role->id == 4)
  {{-- ---------------------------------mulai mahasiswa--------------------------- --}}
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
    <a href="pages/widgets.html" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Kartu Rencana Studi
        <span class="right badge badge-danger">New</span>
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="pages/widgets.html" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Kartu Hasil Studi
        <span class="right badge badge-danger">New</span>
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="pages/widgets.html" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
        Transkip Nilai
        <span class="right badge badge-danger">New</span>
      </p>
    </a>
  </li>

  @endif
       
</li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
