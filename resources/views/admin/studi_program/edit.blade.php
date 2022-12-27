@extends('template.home')
@section('content')
<html>
    <head>
        <title>Edit data program studi</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Edit Data Program Studi</h3>
                            @foreach ($prodi as $prodis)
                            <form action="/prodi/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $prodis->id }}"> <br/>
                                <div class="form-group">
                                    <label>Kode <span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="code_prodi" value="{{ $prodis->code_prodi }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="name" value="{{ $prodis->name }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="study_faculty_id" required="required">
                                        <option value="">- Pilih Fakultas -</option>
                                        @foreach ($study_faculty_id as $data)
                                        <option value="{{$data->id}}" <?php echo $data->id == $prodis->study_faculty_id ? 'selected' : ' ';  ?>>
                                            {{$data->name}}
                                        </option>
                                        @endforeach 
                                    </select>
                                </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/prodi" class="btn btn-danger">Kembali</a>
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