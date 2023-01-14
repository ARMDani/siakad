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
                          <form method="post" action="/student/import_excel" enctype="multipart/form-data">
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
                <form action="/student/create" method="get">
                  {{ csrf_field() }}

                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                    <div class="col">
                      <button type="button" class="btn btn-warning mr-5 float-right" data-toggle="modal" data-target="#importExcel">Import Data</button>
                      <a href="/student/export_excel" class="btn btn-success mr-3 float-right" target="_blank">Export Data</a>
                    </div>
                  </div>
                </form>
                  <div class="input-group mb-3 col-12" >
                    <form action="/student/cari" method="GET">
                      <span class="input-group-append">
                        <input class="col-12" type="text" name="cari" placeholder="Cari Mahasiswa .." value="{{ old('cari') }}">
                        <input type="submit" value="CARI">
                      </span>
                    </form>
                  </div>
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
                  <?php $no = $student->currentPage() * $student->perPage() -9 ; ?>
                  @foreach ($student as $students)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $students->name }}</td>
                    <td>{{ $students->nim }}</td>
                    <td>{{ $students->gender }}</td>
                    <td>{{ $students->religion }}</td>
                    <td>{{ $students->study_program->name }}</td>
                    <td>{{ $students->districts->name }}</td>
                    <td>{{ $students->class->name }}</td>
                    <td>{{ $students->generations->name }}</td>
                    <td>
                      <img src="{{ url('public/Image/'.$students->photo) }}"
                      style="width: 150px;">
                    </td>
                    <td>
                        <a href="/student/edit/{{ $students->id }}" class="btn btn-secondary"> Edit </a>
                        <a href="/student/hapus/{{ $students->id }}"class="btn btn-danger"> Hapus </a>
                    </td>
                  </tr>
                  <?php $no++ ?>
                  @endforeach
              </table>
              <br/>
                Halaman : {{ $student->currentPage() }} <br/>
                Jumlah Data : {{ $student->total() }} <br/>
                Data Per Halaman : {{ $student->perPage() }} <br/>
                {{ $student->links() }}
           
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









  