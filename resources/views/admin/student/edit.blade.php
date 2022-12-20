@extends('template.home')
@section('content')
<html>
    <head>
        <title>Edit data Mahasiswa</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Mahasiswa </h3>
                            @foreach ($student as $student)
                            <form action="/student/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $student->id }}"> <br/>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="name" value="{{ $student->name }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="nim" value="{{ $student->nim }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="gender" value="{{ $student->gender }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="religion" value="{{ $student->religion }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="study_program_id" value="{{ $student->study_program_id }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Asal Daerah<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="districts_id" value="{{ $student->districts_id }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="class_id" value="{{ $student->class_id }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="generations_id" value="{{ $student->generations_id }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Foto<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="photo" value="{{ $student->photo }}"> <br/>
                                </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/student" class="btn btn-danger">Kembali</a>
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