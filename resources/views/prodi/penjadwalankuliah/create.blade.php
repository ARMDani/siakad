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
           <form action="/penjadwalan/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-3">
                  <div class="card bg-dark ">
                    <div class="card-body">
                        <select class="form-control" name="study_program" required="required">
                            <option value="">- Pilih Program Studi -</option>
                            @foreach ($study_program as $data)
                            <option value="{{$data->id}}">
                            {{$data->name}}
                            </option>
                            @endforeach 
                        </select>
                        <br>
                        <select class="form-control" name="academic_year" required="required">
                            <option value="">- Pilih Tahun Akademik -</option>
                            @foreach ($academic_year as $data)
                            <option value="{{$data->id}}">
                            {{$data->name}}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="subject_course" required="required">
                                <option value="">- Pilih Mata Kuliah -</option>
                                @foreach ($subject_course as $data)
                                <option value="{{$data->id}}">
                                   {{$data->name}}
                                </option>
                                @endforeach 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="class" required="required">
                                <option value="">- Pilih Kelas -</option>
                                @foreach ($class as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Hari<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="academic_day" required="required">
                                <option value="">- Pilih Hari -</option>
                                @foreach ($academic_day as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach 
                            </select>
                        </div>
                       
                        <div class="form-group">
                            <label>Jam Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="time" name="start_time"placeholder="Masukkan Alamat ..." required="required">
                        </div>

                        <div class="form-group">
                            <label>Selesai Kuliahk<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="time" name="hour_over"placeholder="Masukkan Alamat ..." required="required">
                        </div>
                        
                        <div class="form-group">
                            <label>Dosen Pengajar<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="lecturer" required="required">
                                <option value="">- Pilih Dosen -</option>
                                @foreach ($lecturer as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach 
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Ruangan<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="academic_room" required="required">
                                <option value="">- Pilih Ruangan -</option>
                                @foreach ($academic_room as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach 
                            </select>
                        </div>
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