@extends('template.home')
@section('content')
<html>
    <head>
        <title>Tambah data Kelas</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Tambah Data Kelas </h3>
                            <form action="/kelas/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Masukan Kelas ..." type="text" name="name" required="required">
                            </div>
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/kelas" class="btn btn-danger">Kembali</a>
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