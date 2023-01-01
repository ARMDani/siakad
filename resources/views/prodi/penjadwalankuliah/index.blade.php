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
            <ul class="list-group list-group-flush">
              <li class="list-group-item">: {{ Auth::user()->name }}</a></li>
              <li class="list-group-item">
                  <select class="form-control" name="religion" required="required">
                    <option value="">- Pilih Tahun Akademik -</option>
                    <option value="1" >2022</option>
                    <option value="0" >2021</option>
                    <option value="1" >2020</option>
                    <option value="1" >2019</option>
                    <option value="1" >2018</option>
                </select>
              </li>
            </ul>
            <br>
            <a href="#" class="btn btn-primary">Refresh</a>
            <a href="#" class="btn btn-warning ml-4">Cetak</a>
            <a href="/penjadwalan/create" class="btn btn-success ml-4">Tambah Jadwal</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form class="input-group-append" action="/matakuliah/cari"  method="GET">
            <input class="form-control" type="text"  name="cari" placeholder="Cari Mata Kuliah .." value="{{ old('cari') }} ">
            <input type="submit" value="CARI">
        </form>
      </div>
    </div>
        
      {{-- -------------------------------------tabel jadwal----------------------------------------------------------------------- --}}
     <div class="card-body">
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center">
              <th>No</th>
              <th>Mata Kuliah</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam Kuliah</th>
              <th>Selesai Kuliah</th>
              <th>Dosen Pengajar</th>
              <th>Ruangan</th>
              <th>Opsi</th>
            </tr>
            <?php $no = $penjadwalankuliah->currentPage() * $penjadwalankuliah->perPage() -9 ; ?>
            @foreach ($penjadwalankuliah as $penjadwalankuliahs)
            <tr class="text-center">
                <td>{{ $no }}</td>
                <td>{{ $penjadwalankuliahs->subject_course->name }}</td>
                <td>{{ $penjadwalankuliahs->class->name }}</td>
                <td>{{ $penjadwalankuliahs->academic_day->name }}</td>
                <td>{{ $penjadwalankuliahs->start_time }}</td>
                <td>{{ $penjadwalankuliahs->hour_over }}</td>
                <td>{{ $penjadwalankuliahs->lecturer->name }}</td>
                <td>{{ $penjadwalankuliahs->academic_room->name }}</td>
                <td >
                    <a href="/penjadwalankuliah/edit/{{ $penjadwalankuliahs->id }}" class="btn btn-secondary"> <i class="nav-icon fas fa-edit"></i></a>
                    <a href="/penjadwalankuliah/hapus/{{ $penjadwalankuliahs->id }} "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php $no++ ?>
            @endforeach
        </table>
      </div>

    </div>
  </div>
        <!-- /.card-body -->
@endsection 
