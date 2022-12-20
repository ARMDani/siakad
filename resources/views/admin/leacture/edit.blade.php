@extends('template.home')
@section('content')
<html>
    <head>
        <title>Edit data Dosen</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Dosen</h3>
                            @foreach ($faculty as $faculti)
                            <form action="/leacture/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $leacture->id }}"> <br/>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="name" value="{{ $leacture->name }}"> <br/>
                                </div>
                                <div class="form-group">
                                <label>NIDN<span class="required" style="color: #dd4b39;">*</span></label>
                                <input type="number" required="required" name="NIDN" value="{{ $leacture->code_faculty }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="gender" value="{{ $leacture->gender }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="religion" value="{{ $leacture->religion }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Alamat<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="address" value="{{ $leacture->religion }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Foto<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="photo" value="{{ $leacture->photo }}"> <br/>
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