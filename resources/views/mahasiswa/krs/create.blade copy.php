@extends('template.home')
@section('content')
<html>
<head>
        <title>Tambah Jadwal</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
 </head>
 <body>
    <div class="content-wrapper">
        <div class="col-sm-12">
         <div class="card">
          <div class="card-body">
           <h3>Tambah Jadwal </h3>
           <form action="/krsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="row">
                <table class="table table-bordered table-hover table-wrapper">
          
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Ruangan</th>
                        <th>Semester</th>
                        <th>Jam Kuliah</th>
                        <th>Dosen</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($mahasiswa as $mahasiswas)
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td >
                          <a href="/penjadwalankuliah/edit/{{ $mahasiswas->id }}" class="btn btn-secondary"> <i class="nav-icon fas fa-edit"></i></a>
                          <a href="/penjadwalankuliah/hapus/{{ $mahasiswas->id }} "class="btn btn-danger"> <i class="nav-icon fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    </tbody>

                  </table>
                     <input class="btn btn-primary" type="submit" value="Simpan Data">
                     <a href="/penjadwalan" class="btn btn-danger">Kembali</a>
                    </form>
                    </div>
                    </div>
                  </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
       
    </body>
</html>

@endsection