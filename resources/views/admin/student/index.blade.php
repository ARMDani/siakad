@extends('template.home')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Mahasiswa</h3>
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
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                              </div>
                              <div class="modal-header">
                                <p>File harus format exel, serta panduan import bisa lihat disini</p>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                              </div>
                              <form method="post" action="/student/import_excel" enctype="multipart/form-data">
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
                  @if ($import = Session::get('import'))
                      <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $import }}</strong>
                      </div>
                  @endif
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
                  {{-- Begin row --}}
                  <div class="row">
                    <div class="col-1">
                      <form action="/student/create" method="get">
                        {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary" ><i class="fas fa-plus"></i></button>
                            <a class="btn btn-success" href="/student"><i class="fas fa-redo-alt"></i></a>
                      </form>
                    </div>
                      <div class="col-2">
                        <a class="nav-link" data-widget="navbar-search" href="#">
                          <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                          <form class="form-inline" action="/student/cari" method="GET">
                            <div class="input-group input-group-sm">
                              <input class="form-control" type="text" name="cari" placeholder="Cari Data Mahasiswa ..."  value="{{ old('cari') }}">
                              <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit" value="CARI">
                                  <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    <div class="col-9">
                        <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel"><i class="fas fa-file-import"></i></button>
                        <a href="/student/export_excel" class="btn btn-success mr-3 float-right" target="_blank"><i class="fas fa-file-export"></i></a>
                    </div>
                  </div>
                  {{-- end row --}}
                <table class="table table-bordered table-hover table-wrapper">
                  <tr class="text-center">
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
                  <?php $no = $student->currentPage() * $student->perPage() -9 ; ?>
                  @foreach ($student as $students)
                  <tr>
                    <td class="text-center">{{ $no }}</td>
                    <td>{{ $students->name }}</td>
                    <td>{{ $students->nim }}</td>
                    <td class="text-center">{{ $students->gender }}</td>
                    <td>{{ $students->religion }}</td>
                    <td>{{ $students->study_program->name }}</td>
                    <td>{{ $students->districts->name }}</td>
                    <td class="text-center">{{ $students->class->name }}</td>
                    <td class="text-center">{{ $students->generations->name }}</td>
                    <td class="text-center">
                      <img src="{{ url('public/Image/'.$students->photo) }}"
                      style="width: 150px;">
                    </td>
                    <td class="text-center">
                        <a href="/student/edit/{{ $students->id }}" class="btn btn-secondary"> <i class="fas fa-edit"></i> </a>
                        <a href="/student/hapus/{{ $students->id }}"class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i> </a>
                    </td>
                  </tr>
                  <?php $no++ ?>
                  @endforeach
              </table>
              <br/>
              <div class="row">
                <div class="col-10">
                  Halaman : {{ $student->currentPage() }} <br/>
                  Jumlah Data : {{ $student->total() }} <br/>
                  Data Per Halaman : {{ $student->perPage() }} <br/>
                </div>
                <div class="col">
                  {{ $student->links() }}
                </div>
              </div>
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









  