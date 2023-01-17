@extends('template.home')

@section('content')

<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Kartu Rencana Studi</p>
    <div class="row">   
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="/krsmahasiswa" method="post">
              {{ csrf_field() }} 
              <div class="form-group row">
                <div class="card col-5" style="width: 18rem;">
                 
                  @foreach ($mahasiswa as $data)
                  <ul class="list-group list-group-flush" value="{{ $data->id }}">
                  
                 
                    <li class="list-group-item"><b>NIM : </b> {{ $data->nim}} </li>
                    <li class="list-group-item"><b>Nama : </b> {{ $data->name }} </li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> {{ $data->study_program->name }}</li>
                    
                    @endforeach
                    
                  </ul>
                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                <li class="list-group ml-2"> 
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
         
          </div>
          @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
               <button type="button" class="close close-light" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if (session('hapus'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('hapus') }}
               <button type="button" class="close close-light" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
      

          <form action="/krsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="tahun_akdemik" value="{{ $tahun_akademik}}">
        </div>
      </div>
    </div>        
      {{-- -------------------------------------tabel jadwal----------------------------------------------------------------------- --}}
      <div class="col-12">  
      <div class="card">
        <div class="card-body">
      <ul>
      <a href="{{ URL::to('/krs/pdf') }}" class="btn btn-warning ml-">Cetak</a>
      <a href="/krsmahasiswa/createmahasiswa/{{ $tahun_akademik }}" class="btn btn-success ml-4">Tambah KRS</a>
    </ul>
    <form class="form-inline">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <br>
 
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center">
                <th>No</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Ruangan</th>
                <th>Semester</th>
                <th>Jam Kuliah</th>
                <th>Selesai Kuliah</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1  ?>
            @foreach ($krsmahasiswa as $krsmahasiswas)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->subject_course->name }}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->subject_course->sk }}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->academic_room->name}}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->academic_year->semester}}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->start_time}}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->hour_over}}</td>
              <td>{{ $krsmahasiswas->lecture_schedulings->lecturer->name }}</td>
            
              <td >
                <a href="/krsmahasiswa/destroymahasiswa/{{ $krsmahasiswas->id }} "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
            </td>
          </tr>
            <?php $no++ ?>
            @endforeach
        </table>
      </form>
      </div>
    </div>
  </div>
    </div>
</div>
        <!-- /.card-body -->
@endsection 
