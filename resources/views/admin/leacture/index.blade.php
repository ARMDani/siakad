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
                            <li class="breadcrumb-item active">Data Dosen</li>
                          </ol>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container">
                    <div class="card-body">
                        <div class="card-body">
                          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                              <div class="col-sm-12 col-md-4">
                                <div class="dt-buttons btn-group flex-wrap mt-5">
                                  <h3>Data Dosen</h3>
                                  <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="/leacture/create"><button href="" type="button" class="btn btn-success">Tambah Data</button></a>
                                    <button type="button" class="btn btn-outline-warning">Export</button>
                                    <button type="button" class="btn btn-outline-warning btn-flat">Inport</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control rounded-0">
                          <span class="input-group-append">
                            <button type="button" class="btn btn-success">Cari!</button>
                          </span>
                        </div>
                        <div class="container-fuild">
                            <table class="table table-bordered table-hover table-wrapper">
                                <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>NIDN</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Agama</th>
                                  <th>Alamat</th>
                                  <th>Foto</th>
                                </tr>
                                <?php $no = $leacture->currentPage() * $leacture->perPage() -9 ; ?>
                                @foreach ($leacture as $leactures)
                                <tr>
                                  <td>{{ $no }}</td>
                                  <td>{{ $leactures->name }}</td>
                                  <td>{{ $leactures->nidn }}</td>
                                  <td>{{ $leactures->gender }}</td>
                                  <td>{{ $leactures->religion }}</td>
                                  <td>{{ $leactures->address }}</td>
                                  <td>{{ $leactures->photo }}</td>
                                  <td >
                                    <a href="/leacture/edit/{{ $leactures->id }}" class="btn btn-secondary"> Edit </a>
                                    <a href="/leacture/hapus/{{ $leactures->id }}"class="btn btn-danger"> Hapus </a>
                                  </td>
                                </tr>
                                <?php $no++ ?>
                                @endforeach
                            </table>
                            <br/>
                            Halaman : {{ $leacture->currentPage() }} <br/>
                            Jumlah Data : {{ $leacture->total() }} <br/>
                            Data Per Halaman : {{ $leacture->perPage() }} <br/>
                            {{ $leacture->links() }}
                        </div>
                    </div>
                  </div>
              </div>
</div>
@endsection









  