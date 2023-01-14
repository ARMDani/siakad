@extends('template.home')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Mata Kuliah</h3>
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
                          <form method="post" action="/matakuliah/import_excel" enctype="multipart/form-data">
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
                <form action="/matakuliah/create" method="get">
                  {{ csrf_field() }}

                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/matakuliah/export_excel" class="btn btn-success mr-3 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                  <div class="input-group mb-3 col-12" >
                    <form action="/matakuliah/cari" method="GET">
                      <span class="input-group-append">
                        <input class="col-12" type="text" name="cari" placeholder="Cari Fakultas .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
                <table class="table table-bordered table-hover table-wrapper">
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
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
      </div>

      {{-- END ROW 2 --}}

    </div>
    {{-- END CONTAINER --}}

  </div>
  {{-- END CONTENT --}}
 
</div>

@endsection









  