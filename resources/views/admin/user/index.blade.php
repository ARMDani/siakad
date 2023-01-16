@extends('template.home')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>DATA <strong> USER </strong> ISTEK 'Aisyiyah Kendari</h3>
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
                  <div class="row">
                    <div class="col">
                      {{-- Begin Import data --}}
                      {{-- notifikasi form validasi --}}
                      @if ($errors->has('file'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('file') }}</strong>
                      </span>
                      @endif
                      {{-- notifikasi sukses --}}
                      @if ($sukses = Session::get('sukses'))
                      <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $sukses }}</strong>
                      </div>
                      @endif
                      <!-- Import Excel -->
                      <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <form method="post" action="/fakultas/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                              </div>
                              <div class="modal-body">
                                {{ csrf_field() }}
                                <label>Pilih file excel</label>
                                <div class="form-group">
                                  <input type="file" name="file" required="required">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      {{-- End Import data --}}
                    </div>
                  </div>
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
                      
                  <form class="form-inline">
                    <div class="form-group mr-1">
                      <a class="btn btn-success" href="/user">Refresh</a>
                    </div>
                    <div class="form-group mr-1">
                        <a class="btn btn-primary" href="/user/create">Tambah</a>
                    </div>
                </form>
                    <div class="col">
                      <button type="button" class="btn btn-light mr-4 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/fakultas/export_excel" class="btn btn-success ml-5 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                <div class="">
                  <form action="/user/cari" method="GET">
                    <span class="input-group-append">
                      <input class="form-control" type="text" name="cari" placeholder="Cari User .." value="{{ old('cari') }}">
                      <input class="mr-2 for btn btn-light" type="submit" value="CARI">
                    </span>
                  </form>
                </div>
                <table class="table table-bordered table-hover table-wrapper">
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th># Opsi</th>
                  </tr>
                  
                  <?php $no = $pengguna->currentPage() * $pengguna->perPage() -9 ; ?>
                  @foreach ($pengguna as $penggunas)
                  <tr class="text-center">
                    <td>{{ $no++ }}</td>
                      <td>{{ $penggunas->name }}</td>
                      <td>{{ $penggunas->username }}</td>
                      <td>{{ $penggunas->email }}</td>
                      <td>
                        <h6 class="text-primary">{{  $penggunas->role->name }}</h6>
                      </td>
                      <td>
                          <a href="/user/edit/{{ $penggunas->id }}" class="btn btn-light"> Edit </a>
                          <a href="/user/hapus/{{ $penggunas->id }}"class="btn btn-danger"> Hapus </a>
                          <a href="/user/aktif/{{ $penggunas->id }}"class="btn btn-primary"> Aktif </a>
                      </td>
                  </tr>
              
              @endforeach
            </table>
              <br/>
                Halaman : {{ $pengguna->currentPage() }} <br/>
                Jumlah Data : {{ $pengguna->total() }} <br/>
                Data Per Halaman : {{ $pengguna->perPage() }} <br/>
                {{ $pengguna->links() }}
           
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









  















  