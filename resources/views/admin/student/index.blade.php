@extends('template.home')

@section('content')
<style type="text/css">
  .pagination li{
    float: left;
    list-style-type: none;
    margin:5px;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="card-body">
                  <div class="card-body">
                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="dt-buttons btn-group flex-wrap mt-5">
                                  <h3>Data Mahasiswa</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/student/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <form action="/student/cari" method="GET">
                      <input type="text" class="form-control rounded-0">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Mahasiswa .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                  <div class="container-fuild">
                    <table class="table table-bordered table-hover table-wrapper">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>NIM</th>
                          <th>Jenis Kelamin</th>
                          <th>Agama</th>
                          <th>Program Studi</th>
                          <th>Asal Daerah</th>
                          <th>Kelas</th>
                          <th>Angkatan</th>
                          <th>Photo</th>
                          <th>Opsi</th>
                        </tr>
                        <?php $no = $students->currentPage() * $students->perPage() -9 ; ?>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->religion }}</td>
                            <td>{{ $student->study_program->name }}</td>
                            <td>{{ $student->districts->name }}</td>
                            <td>{{ $student->class->name }}</td>
                            <td>{{ $student->generations->name }}</td>
                            <td>
                              <img src="{{ url('public/Image/'.$student->photo) }}"
                              style="width: 150px;">
                            </td>
                            <td>
                                <a href="/student/edit/{{ $student->id }}" class="btn btn-secondary"> Edit </a>
                                <a href="/student/hapus/{{ $student->id }}"class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </table>
                    <br/>
                    Halaman : {{ $students->currentPage() }} <br/>
                    Jumlah Data : {{ $students->total() }} <br/>
                    Data Per Halaman : {{ $students->perPage() }} <br/>
                    {{ $students->links() }}
                  </div>
        </div>
    </div>
</div>      
@endsection









  