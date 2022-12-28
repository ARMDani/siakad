@extends('template.home')
@section('content')
<html>
    <head>
        <title>Edit data mata kuliah</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Mata Kuliah </h3>
                            @foreach ($course as $course)
                            <form action="/matakuliah/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $course->id }}"> <br/>
                                <div class="form-group">
                                    <label>Kode Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="number" required="required" name="course_code" value="{{ $course->course_code }}">
                                </div>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="name" value="{{ $course->name }}">
                                </div>
                                <div class="form-group">
                                    <label>SKS<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="number" required="required" name="sk" value="{{ $course->sk }}">
                                </div>
                                <div class="form-group">
                                    <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="number" required="required" name="semester" value="{{ $course->semester }}">
                                </div>
                                <div class="form-group">
                                    <label>Dosen<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="lecturer_id" required="required">
                                        @foreach ($leacture as $data)
                                        <option value="{{$data->id}}" <?php echo $data->id == $course->lecturer_id ? 'selected' : ' ';  ?>>
                                            {{$data->name}}
                                        </option>
                                        @endforeach 
                                        </select>
                                </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/matakuliah" class="btn btn-danger">Kembali</a>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

@endsection