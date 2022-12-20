@extends('template.home')
@section('content')
<html>
    <head>
        <title>Tambah data Program Studi</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Tambah Data Program Studi</h3>
                            <form action="/prodi/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label>Kode Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="number" name="code_prodi"placeholder="Masukkan Program Studi ..." required="required">
                            </div>
                            <div class="form-group">
                                <label>Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Masukan Program Studi ..." type="text" name="name" required="required">
                            </div>
							<div class="form-group">
                                <label>Fakultas<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="study_faculty">
                                    <option value="">- Pilih Fakultas -</option>
                                    @foreach ($study_faculty_id as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select>
                            </div>
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/student" class="btn btn-danger">Kembali</a>
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