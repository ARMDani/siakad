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
              <li class="breadcrumb-item active">Data Mata Kuliah</li>
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
                                  <h3>Data Mata Kuliah</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/matakuliah/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <form action="/matakuliah/cari" method="GET">
                      <input type="text" class="form-control rounded-0">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Mata Kuliah .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                  <div class="container-fuild">
                    <table class="table table-bordered table-hover table-wrapper">
                        <tr>
                          <th>No</th>
                          <th>Kode Mata Kuliah</th>
                          <th>Nama</th>
                          <th>SKS</th>
                          <th>Semester</th>
                          <th>Dosen</th>
                          <th>Opsi</th>
                        </tr>
                        <?php $no = $course->currentPage() * $course->perPage() -9 ; ?>
                        @foreach ($course as $courses)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $courses->course_code }}</td>
                            <td>{{ $courses->name }}</td>
                            <td>{{ $courses->sk }}</td>
                            <td>{{ $courses->semester }}</td>
                            <td>{{ $courses->lecturer->name }}</td>
                            <td >
                                <a href="/matakuliah/edit/{{ $courses->id }}" class="btn btn-secondary"> Edit </a>
                                <a href="/matakuliah/hapus/{{ $courses->id }}"class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </table>
                    <br/>
                    Halaman : {{ $course->currentPage() }} <br/>
                    Jumlah Data : {{ $course->total() }} <br/>
                    Data Per Halaman : {{ $course->perPage() }} <br/>
                    {{ $course->links() }}
                  </div>
        </div>
    </div>
</div>      
@endsection









  