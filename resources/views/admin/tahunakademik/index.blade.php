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
              <li class="breadcrumb-item active">Data Program Studi</li>
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
                                  <h3>Data Program Studi</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/prodi/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                    <form action="/prodi/cari" method="GET">
                      <input type="text" class="form-control rounded-0">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Program Studi .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                  <div class="container-fuild">
                    <table class="table table-bordered table-hover table-wrapper">
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Program Studi</th>
                          <th>Fakultas</th>
                          <th>Opsi</th>
                        </tr>
                        <?php $no = $prodi->currentPage() * $prodi->perPage() -9 ; ?>
                        @foreach ($prodi as $prodis)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $prodis->code_prodi }}</td>
                            <td>{{ $prodis->name }}</td>
                            <td>{{ $prodis->study_faculty->name }}</td>
                            <td >
                                <a href="/prodi/edit/{{ $prodis->id }}" class="btn btn-secondary"> Edit </a>
                                <a href="/prodi/hapus/{{ $prodis->id }}"class="btn btn-danger"> Hapus </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </table>
                    <br/>
                    Halaman : {{ $prodi->currentPage() }} <br/>
                    Jumlah Data : {{ $prodi->total() }} <br/>
                    Data Per Halaman : {{ $prodi->perPage() }} <br/>
                    {{ $prodi->links() }}
                  </div>
        </div>
    </div>
</div>      
@endsection









  