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
                            <h3>Edit Data Kelas</h3>
                            @foreach ($class as $kelas)
                            <form action="/kelas/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $kelas->id }}"> <br/>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="name" value="{{ $kelas->name }}"> <br/>
                                </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/kelas" class="btn btn-danger">Kembali</a>
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