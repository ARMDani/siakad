@extends('template.home')
@section('content')
<html>
    <head>
        <title>Edit data fakultas</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Fakultas </h3>
                            @foreach ($faculty as $faculti)
                            <form action="/fakultas/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $faculti->id }}"> <br/>
                                <div class="form-group">
                                <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="number" required="required" name="code_faculty" value="{{ $faculti->code_faculty }}">
                                </div>
                                <div class="form-group">
                                <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" required="required" name="name" value="{{ $faculti->name }}">
                                </div>
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/fakultas" class="btn btn-danger">Kembali</a>
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