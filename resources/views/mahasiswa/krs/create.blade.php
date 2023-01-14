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
           <h3>Tambah Rencana Studi </h3>
           <form action="/krsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-bordered table-hover table-wrapper">
          
                        <thead>
                          <tr class="text-center">
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Ruangan</th>
                            <th>Semester</th>
                            <th>Jam Kuliah</th>
                            <th>Selesai Kuliah</th>
                            <th>Dosen</th>                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1  ?>
                          @foreach ($mahasiswa as $data)
                                                   
                          <tr>
                            
                            <td><input name="pilih[]" value="{{ $data->id }}" type="checkbox" ></td>
                            <td>{{ $no }}</td>
                            <td>{{ $data->subject_course->name }}</td>
                            <td>{{ $data->subject_course->sk }}</td>
                            <td>{{ $data->academic_room->name }}</td>
                            <td>{{ $data->subject_course->semester}}</td>
                            <td>{{ $data->start_time }}</td>
                            <td>{{ $data->hour_over }}</td>
                           
                            <td>{{ $data->lecturer->name }}</td>                            
                        </tr>
                        </tbody>
                       
                        <?php $no++ ?>
                        @endforeach          
                      </table>
                      <br>
                      <input class="btn btn-primary" type="submit" value="Simpan Data">
                            
                      <a href="/krsmahasiswa" class="btn btn-danger">Kembali</a>
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
       
    </body>
</html>

@endsection