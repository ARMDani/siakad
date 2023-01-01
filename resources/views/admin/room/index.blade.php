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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Ruangan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="container">
            <div class="card-body">
              <h3>Data Ruangan</h3>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="/ruangan/create">
                  <button href="" type="button" class="btn btn-success">Tambah Data</button>
                </a>
                <button type="button" class="btn btn-outline-warning">Export</button>
                <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                <li>
                  <div class="input-group mb-12">
                    <form action="/ruangan/cari" method="GET">
                      <span class="input-group-append">
                        <input type="text" name="cari" placeholder="Cari Data Fakultas .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                </li>
              </div>
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12 col-md-4">
                            <div class="dt-buttons btn-group flex-wrap mt-5">
                            </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="container-fuild">
                <table class="table table-bordered table-hover table-wrapper">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kode Ruangan</th>
                      <th>Opsi</th>
                    </tr>
                    <?php $no = $rooms->currentPage() * $rooms->perPage() -9 ; ?>
                    @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->code_room }}</td>
                        <td>
                            <a href="/ruangan/edit/{{ $room->id }}" class="btn btn-secondary"> Edit </a>
                            <a href="/ruangan/hapus/{{ $room->id }}"class="btn btn-danger"> Hapus </a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    @endforeach
                </table>
                <br/>
                Halaman : {{ $rooms->currentPage() }} <br/>
                Jumlah Data : {{ $rooms->total() }} <br/>
                Data Per Halaman : {{ $rooms->perPage() }} <br/>
                {{ $rooms->links() }}
              </div>
            </div>
        </div><!-- /.container-fluid -->
      </div>
                  </div>
    </div>
</div>
@endsection









  