@extends('template.home')
@section('content')
<html>
    <head>
        <title>Tambah Jadwal</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Tambah Jadwal </h3>
                            <form action="/penjadwalan/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
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
                                <label>Kode MK<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="lecturer_id" required="required">
                                    <option value="">- Pilih Kode MK -</option>
                                    @foreach ($subject_course as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->course_code}}
                                    </option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>SKS<span class="required" style="color: #dd4b39;">*</span></label>
                                
                                    <select class="form-control" name="sks" required="required">
                                        <option value="">- Pilih SKS -</option>
                                        <option value="1" >2</option>
                                        <option value="0" >3</option>
                                    </select>
                            </div>
							<div class="form-group">
                                <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="semester" required="required">
                                    <option value="">- Pilih Semester -</option>
                                    <option value="1" >1</option>
                                    <option value="0" >2</option>
                                    <option value="1" >2</option>
                                    <option value="1" >4</option>
                                    <option value="1" >5</option>
                                    <option value="1" >6</option>
                                    <option value="1" >7</option>
                                    <option value="1" >8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jam Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="time" name="lecture_hours"placeholder="Masukkan Alamat ..." required="required">
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
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/penjadwalan" class="btn btn-danger">Kembali</a>
                            </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

@endsection