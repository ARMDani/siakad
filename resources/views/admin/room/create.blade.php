@extends('template.home')
@section('content')
<html>
    <head>
        <title>Tambah data Ruangan</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Tambah Data Ruangan</h3>
                            <form action="/ruangan/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Masukan Nama ..." type="text" name="name" required="required">
                            </div>
                            <div class="form-group">
                                <label>Code Ruangan<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="code_room"placeholder="Masukkan Kode Ruangan ..." required="required">
                            </div>
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/ruangan" class="btn btn-danger">Kembali</a>
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