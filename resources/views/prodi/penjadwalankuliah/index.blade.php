@extends('template.home')

@section('content')

<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Penjadwalan Kuliah</p>
    <div class="row">
      <div class="col-sm-3">
        <div class="card ">
          <div class="card-body ">
            <ul class="list-group list-group-flush bg-">
              <li class="list-group-item  "> <b>Program Studi </b> </li>
              <li class="list-group-item  ">Tahun Akademik </li>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-sm-9">
        <div class="card">
          <div class="card-body">
            <form action="/penjadwalan" method="post">
              {{ csrf_field() }}
            <ul class="list-group list-group-flush">
              <li class="list-group-item">: {{ Auth::user()->name }}</a></li>
              <li class="list-group-item">
                <select class="form-control" name="tahun_akademik_id" required="required">
                  <option value="">- Pilih Tahun Akademik -</option>
                  @foreach ($academic_year as $data)
                  @if ($data->id==$tahun_akademik)
                  <option selected value="{{$data->id}}">
                    {{$data->name}}
                    </option> 
                  @else
                  <option value="{{$data->id}}">
                    {{$data->name}}
                    </option> 
                  @endif
                 
                  @endforeach 
              </select>
              </li>
            </ul>
            <br>
            <button type="submit" class="btn btn-primary" >Refresh</button>
            {{-- <a href="#" class="btn btn-warning ml-4">Cetak</a>
            <a href="/penjadwalan" class="btn btn-success ml-4">Tambah Jadwal</a> --}}
          </div>

          <form action="/penjadwalan/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="tahun_akdemik" value="{{ $tahun_akademik}}">
        </div>
      </div>
    </div>        
      {{-- -------------------------------------tabel jadwal----------------------------------------------------------------------- --}}
     <div class="card">
      <div class="navbar-search-block">
        <form class="form-inline" action="/penjadwalan/cari" method="GET">
          <div class="input-group input-group-sm">
            <input class="form-control" type="text" name="cari" placeholder="Cari Jadwal ..."  value="{{ old('cari') }}">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit" value="CARI">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
     
        <div class="card">
          <div class="card-body">
                       {{-- notifikasi sukses --}}
            @if ($sukses = Session::get('error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $sukses }}</strong>
            </div>
            @endif
            @if ($sukses = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $sukses }}</strong>
            </div>
            @endif
      
      
      <a href="#" class="btn btn-warning ">Cetak</a>
      <a href="/penjadwalan/create/{{ $tahun_akademik }}" class="btn btn-success ml-4">Tambah Jadwal</a>
    <br>
    <br>
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center">
              <th>No</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam Kuliah</th>
              <th>Selesai Kuliah</th>
              <th>Dosen Pengajar</th>
              <th>Ruangan</th>
              <th>Opsi</th>
            </tr>
            <?php $no = 1  ?>
            @foreach ($matakuliah as $matakuliahs)
            <tr class="text-center">
                <td>{{ $no }}</td>
                <td>{{ $matakuliahs->subject_course->name }}</td>
                <td>{{ $matakuliahs->subject_course->sk }}</td>
                <td>{{ $matakuliahs->class->name }}</td>
                <td>{{ $matakuliahs->academic_day->name }}</td>
                <td>{{ $matakuliahs->start_time }}</td>
                <td>{{ $matakuliahs->hour_over }}</td>
                <td>{{ $matakuliahs->lecturer->name }}</td>
                <td>{{ $matakuliahs->academic_room->name }}</td>
                <td >
                    <a href="/penjadwalankuliah/edit/{{ $matakuliahs->id }}" class="btn btn-secondary"> <i class="nav-icon fas fa-edit"></i></a>
                    <a href="/penjadwalankuliah/hapus/{{ $matakuliahs->id }} "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php $no++ ?>
            @endforeach
        </table>
      </form>
      </div>
    </div>
  </div>
        <!-- /.card-body -->
@endsection 
