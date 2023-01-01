@extends('template.home')
@section('content')
<html>
    <head>
        <title>Tambah data student</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Tambah Data Mata Kuliah </h3>
                            <form action="/matakuliah/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label>Kode Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="course_code"placeholder="Masukkan Kode Mata Kuliah  ..." required="required">
                            </div>
                            <div class="form-group">
                                <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Masukan Mata Kuliah ..." type="text" name="nama" required="required">
                            </div>
                            <div class="form-group">
                                <label>SKS<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="number" name="sk"placeholder="Masukkan SKS  ..." required="required">
                            </div>
                            <div class="form-group">
                                <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="number" name="semester"placeholder="Masukkan Semester  ..." required="required">
                            </div>
							<div class="form-group">
                                <label>Dosen<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="lecturer_id" required="required">
                                    <option value="">- Dosen -</option>
                                    @foreach ($leacture as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select> 
                            </div>
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/matakuliah" class="btn btn-danger">Kembali</a>
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