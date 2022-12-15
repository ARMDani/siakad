@extends('template.home')

@section('content')

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
              <li class="breadcrumb-item active">Data Fakultas</li>
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
                            <th>NIM</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Program Studi</th>
                            <th>Asal Daerah</th>
                            <th>Kelas</th>
                            <th>Angkatan</th>
                            <th>Photo</th>
                            <th>Opsi</th>
                            @foreach ($student as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->nim }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->religion }}</td>
                                <td>{{ $student->study_program_id }}</td>
                                <td>{{ $student->districts_id }}</td>
                                <td>{{ $student->class_id }}</td>
                                <td>{{ $student->generations_id }}</td>
                                <td>{{ $student->photo }}</td>

                                <td >
                                    <a href="/admin/student/edit/{{ $student->id }}" class="btn btn-secondary"> Edit </a>
                                    <a href="/admin/student/hapus/{{ $student->id }}"class="btn btn-danger"> Hapus </a>
                                </td>
                            </tr>
                            @endforeach
                      
                        </table>
                      </div>
                       </div>
                </div>
            </div>
        </div>
        </div>
      </div>
            </div>
        <br/>
    </body>

@endsection









  