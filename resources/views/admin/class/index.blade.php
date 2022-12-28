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
              <li class="breadcrumb-item active">Data Kelas</li>
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
                                  <h3>Data Kelas</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/kelas/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <form action="/kelas/cari" method="GET">
                      <input type="text" class="form-control rounded-0">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Kelas .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                  <div class="container-fuild">
                    <table class="table table-bordered table-hover table-wrapper">
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Opsi</th>
                        </tr>
                        <?php $no = $class->currentPage() * $class->perPage() -9 ; ?>
                        @foreach ($class as $kelas)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $kelas->name }}</td>
                            <td >
                                <a href="/kelas/edit/{{ $kelas->id }}" class="btn btn-secondary"> Edit </a>
                                <a href="/kelas/hapus/{{ $kelas->id }}"class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </table>
                    <br/>
                    Halaman : {{ $class->currentPage() }} <br/>
                    Jumlah Data : {{ $class->total() }} <br/>
                    Data Per Halaman : {{ $class->perPage() }} <br/>
                    {{ $class->links() }}
                  </div>
        </div>
    </div>
</div>      
@endsection









  