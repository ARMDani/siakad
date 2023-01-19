@extends('master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if (Auth::user()->roles->id == 1)
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Selamat Datang</strong></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="text-light">{{ $fakultas[0]->jumlah}}</h3>
                <p>Fakutas</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
              <a href="/fakultas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 
                  <h3 class="text-light">{{ $programstudi[0]->nilai}}</h3>
                
                <p>Prodi</p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <a href="/prodi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-dark">{{ $dosen[0]->nilai}}</h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="/leacture" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-light">{{ $mahasiswas[0]->nilai}}</h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="/student" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        @endif

        @if (Auth::user()->roles->id == 2)
        <section class="content">
          <div class="container-fluid">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Selamat Datang</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class="text-light">{{ $matakuliah[0]->nilai}}</h3>

                <p>Mata Kuliah</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="/matakuliah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="text-dark">{{ $dosen[0]->nilai}}</h3>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="/leacture" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-light">{{ $mahasiswas[0]->nilai}}</h3>

                <p>Mahasiswa</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="/student" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        @endif

        @if (Auth::user()->roles->id == 3)
            <div>
              <br>
                @foreach ($lecturer as $data)   
                <H1 class="text-center">Selamat Datang</H1>
                <H1 class="text-center"><strong>{{ $data->name }}</strong></H1>
                <h5 class="text-center"><strong>NIDN :</strong> {{ $data->nidn }}</h5>
                @endforeach
              <br>
              <br>
              <br>
              <br>
              <div class="text-center mt-6">
                <img src="{{ asset('dist/img/02.png') }}"  alt="Responsive image" width="230px">
              </div>
              <br>
              <br>
              <h1 class="text-center">SISTEM INFORMASI AKADEMIK</h1>
            @endif
            
            
            @if (Auth::user()->roles->id == 4) 
            <div>
              <br>
                @foreach ($mahasiswa as $data)   
                <H1 class="text-center">Selamat Datang</H1>
                <H1 class="text-center"><strong>{{ $data->name }}</strong></H1>
                <h5 class="text-center"><strong>NIM : </strong>{{ $data->nim }}</h5>
                @endforeach
              <br>
              <br>
              <br>
              <br>
              <div class="text-center mt-6">
                <img src="{{ asset('dist/img/02.png') }}"  alt="Responsive image" width="230px">
              </div>
              <br>
              <br>
              <h1 class="text-center">SISTEM INFORMASI AKADEMIK</h1>
            @endif
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
          
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
              </div>
            </div>
            <!-- /.card -->

           
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection