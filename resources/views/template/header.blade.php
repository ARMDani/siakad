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
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src=<div class="text-center" style="margin-bottom: 20px;">
              <img src="../img/umu-buton.png" alt="" width="100px">
          </div>
          
          <table border="0" width="100%">
              <tr>
                  <td colspan="2" style="text-align: center; font-size: 14pt;">KARTU RENCANA STUDI UNIVERSITAS MUSLIM BUTON</td>
              </tr>
              <tr>
                  <td width="35%"><b>Nama</b></td>
                  <td>: <?= $krs[0]->students->nama ?></td>
              </tr>
              <tr>
                  <td width="35%"><b>NIM</b></td>
                  <td>: <?= $krs[0]->students->nim ?></td>
              </tr>
              <tr>
                  <td width="35%"><b>Semester</b></td>
                  <td>: <?= $krs[0]->jadwal->semester->nama ?></td>
              </tr>
              <tr>
                  <td width="35%"><b>Jurusan/Program Studi</b></td>
                  <td>: <?= $krs[0]->students->departments->jenjang ?> <?= $krs[0]->students->departments->nama ?></td>
              </tr>
          </table>
          
          <table class="table" width="100%">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Hari</th>
                      <th>Jam</th>
                      <th>Dosen</th>
                      <th>Kelas</th>
          
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $i = 1;
                  foreach($krs as $mk):
                  ?>
                  <tr>
                      <td><?= $i ?></td>
                      <td>
                          <?= $mk->jadwal->mataKuliah->nama ?>
                      </td>
                      <td>
                          (<?= $mk->jadwal->mataKuliah->sks_teori." - ".(($mk->jadwal->mataKuliah->sks_praktek)?? 0) ?>)
                      </td>
                      <td><?= $mk->jadwal->hari->nama;?></td>
                      <td>
                          <?= date("H:i:s",strtotime($mk->jadwal->jam_awal))." - ".date("H:i:s",strtotime($mk->jadwal->jam_akhir)) ?>
                      </td>
                      <td>
                          <?php
                          $dosen = \common\models\main\PengampuMk::find()->where(['jadwal_id'=>$mk->jadwal_id])->all();
                          if($dosen!=null){
                              foreach ($dosen as $pengampu){
                                  echo strtoupper($pengampu->employees->nama).'<br>';
                              }
                          }
                          ?>
                      </td>
                      <td><?= $mk->jadwal->kelas ?></td>
          
                  </tr>
                  <?php
                  $i++;
                  endforeach;
                  ?>
              </tbody>
          </table>
          
          <br>
          <table width="100%">
              <tr>
                  <td>
                      Jumlah SKS : <b><?= $jumlahSks ?></b>
                  </td>
                  <td style="text-align: right;">
                      Baubau, <?= date('d - m - Y') ?>
                  </td>
              </tr>
          </table>
          <table class="table">
              <thead>
                  <tr>
                      <th><b>Menyetujui</b></th>
                      <th width="35%"><b>Mengetahui</b></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          Mahasiswa,
                          <br><br><br>
                          <u><?= $krs[0]->students->nama ?></u><br>
                          NIM. <?= $krs[0]->students->nim ?>
                      </td>
                      <td>
                          Penasehat Akademik
                          <br><br><br>
                          <u><?= ($krs[0]->students->pembimbingAkademik->nama)?? "<i>{Data tidak ada}</i>" ?></u><br>
                          NIDN/NIDK <?= ($krs[0]->students->pembimbingAkademik->nidk)?? "<i>{Data tidak ada}</i>" ?>
                      </td>
                  </tr>
              </tbody>
          </table>
          <table width="100%">
              <tr>
                  <td style="text-align: center;">
                      Ketua Jurusan/Program Studi
                      <br><br><br>
                      <u><?= ($krs[0]->students->departments->employees->nama)?? "<i>{Data tidak ada}</i>" ?></u><br>
                      NIDN/NIDK. <?= ($krs[0]->students->departments->employees->nidk)?? "<i>{Data tidak ada}</i>" ?>
                  </td>
              </tr>
          </table>" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    {{-- -----------------Sign Out------------------- --}}
   
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
    <li class="nav-item">
    <li class="nav-link dropdown user user-menu card-bg">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs"><img src="{{ asset('dist/img/user2-160x160.png') }}" class="user-image" alt="User Image"></i></span>
      </a>
      <ul class="dropdown-menu">
        <li class="user-header">
          <img src="{{ asset('dist/img/user2-160x160.png') }}" class="img-circle elevation-2" alt="User Image">
          <h6>
            {{ Auth::user()->name }} <br>
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
            <a class="btn btn-danger" href="{{url('logout')}}">Logout <i class="nav-icon fas fa-user"></i></a>
          </div>
        </li>
      </ul>
    </li>
    </li>
  </ul>
  
</nav>
<!-- /.navbar -->