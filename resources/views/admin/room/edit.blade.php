@extends('template.home')
@section('content')
<html>
    <head>
        <title>Edit data Ruangan</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Ruangan </h3>
                            @foreach ($rooms as $room)
                            <form action="/ruangan/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $room->id }}"> <br/>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="name" value="{{ $room->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Code Ruangan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="code_room" value="{{ $room->code_room }}">
                                </div>
                                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                                <a href="/ruangan" class="btn btn-danger">Kembali</a>
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