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
                <label for="staticEmail" class="col-2 col-form-label">Tahun/Angkatan</label>
                <div class="col-3">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" : Pendidikan teknologi Informasi">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-2 col-form-label">NIM</label>
                <div class="col-3">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" : Pendidikan teknologi Informasi">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-2 col-form-label">Nama</label>
                <div class="col-3">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" : Pendidikan teknologi Informasi">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-2 col-form-label">Jurusan/Program Studi</label>
                <div class="col-3">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" : Pendidikan teknologi Informasi">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-2 col-form-label">Penasehat Akademik</label>
                <div class="col-3">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=" : Pendidikan teknologi Informasi">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-2 col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                <li class="list-group col-3 ml-4"> 
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
          <form class="input-group-append" action="/mahasiswa/cari"  method="GET">
              <input class="form-control" type="text"  name="cari" placeholder="Cari Mata Kuliah .." value="{{ old('cari') }} ">
              <input type="submit" value="CARI">
          </form>
      <ul>
      <a href="#" class="btn btn-warning ml-">Cetak</a>
      <a href="/krsmahasiswa/createmahasiswa/{{ $tahun_akademik }}" class="btn btn-success ml-4">Tambah KRS</a>
    </ul>
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
                <a href="/krsmahasiswa/hapus/{{ $krsmahasiswas->id }} "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
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
