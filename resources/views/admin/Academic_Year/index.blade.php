@extends('template.home')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Tahun Akademik</h3>
    </div>
  </div>

  {{-- BEGIN CONTENT --}}
  <div class="content">

    {{-- BEGIN CONTAINER --}}
    <div class="container-fluid">
   
      {{-- BEGIN ROW 2 --}}
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="form">
                {{-- Begin Sesion --}}
                @if ($tambah = Session::get('tambah'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $tambah }}</strong>
                </div>
                @endif
                @if ($edit = Session::get('edit'))
                <div class="alert alert-primary alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $edit }}</strong>
                </div>
                @endif
                @if ($hapus = Session::get('hapus'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $hapus }}</strong>
                </div>
                @endif
              {{-- end Sesion --}}
                  <div class="row">
                    <div class="col">
                      <form action="/tahun_akademik/create" method="get">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary" ><i class="fas fa-plus"></i></button>
                    </div>
                  </div>
                  <table class="table table-bordered table-hover table-wrapper">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Tahun Akademik</th>
                        <th>Semester</th>
                        <th>Jadwal Input Nilai Semester Mahasiswa</th>
                        <th>Jadwal Penawaran Mata Kuliah</th>
                        <th>Status</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($ta as $tahun_akademik)
                      <tr class="text-center">
                        <td>{{ $no }}</td>
                        <td>{{ $tahun_akademik->name }}</td>
                        <td>{{ $tahun_akademik->semester }}</td>
                        <td>{{ $tahun_akademik->start_time_value . " sampai " .$tahun_akademik->end_of_time_value}}</td>
                        <td>{{ $tahun_akademik->start_time_bidding ." sampai ". $tahun_akademik->end_of_time_bidding}}</td>
                        <td>{{ ($tahun_akademik->active == "Y") ? "Aktif" : "Tidak Aktif" }}</td>
                        <td>
                          <a href="/tahun_akademik/active/{{ $tahun_akademik->id }}/Y" type="button" class="btn btn-success">Aktif</a>
                          <a href="/tahun_akademik/active/{{ $tahun_akademik->id }}/N" type="button" class="btn btn-danger">Tidak Aktif</a>
                          <a href="/tahun_akademik/edit{{ $tahun_akademik->id }}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        </td>
                      </tr>
                      <?php $no++ ?>
                      @endforeach
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
         
        </div>
      </div>

      {{-- END ROW 2 --}}

    </div>
    {{-- END CONTAINER --}}

  </div>
  {{-- END CONTENT --}}
 
</div>

@endsection









  