@extends('template.home')
@section('content')
<html>
    <head>
        <title>Tambah data student</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card-mt-5">
                        <div class="card-boy">
                            <h3>Tambah Data Student </h3>
                            <form action="/student/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }} 
                            <div class="form-group">
                                <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama ..." type="text" name="nama" required="required">
                            </div>
                            <div class="form-group">
                                <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                                <input class="form-control" type="text" name="nim"placeholder="Masukkan Nim ..." required="required">
                            </div>
                            <div class="form-group ">
                                <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="gender" name="group_id">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="1" >Laki-Laki</option>
                                        <option value="0" >Perempuan</option>
                                    </select>
                                </div>
                            </div>
							<div class="form-group">
                                <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="agama" name="group_id">
                                    <option value="">- Pilih Agama -</option>
                                    <option value="Islam" >Islam</option>
                                    <option value="Hindu" >Hindu</option>
                                    <option value="Kristen" >Kristen</option>
                                    <option value="Protestan" >Katolik</option>
                                    <option value="Katolik" >Budha</option>
                                    <option value="Budha" >Konghucu</option>
                                    <option value="Konghucu" >Konghucu</option>
                                </select>
                            </div>
							<div class="form-group">
                                <label>Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="program_studi">
                                    <option value="">- Pilih Program Studi -</option>
                                    @foreach ($study_program as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select>
                            </div>
							<div class="form-group">
                                <label>Asal Daerah<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="asal_daerah">
                                    <option value="">- Asal Daerah -</option>
                                    @foreach ($districts as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select>
                            </div>
							<div class="form-group">
                                <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                               <select class="form-control" name="kelas">
                                    <option value="">- Kelas -</option>
                                    @foreach ($class as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select> 
                            </div>
							<div class="form-group">
                                <label>Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="angkatan">
                                    <option value="">- Angkatan -</option>
                                    @foreach ($generations as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select>
                               
                            </div>
							<div class="form-group">
                                <label class=" control-label">Photo<span class="required" style="color: #dd4b39;">*</span></label>
                                <div class="">
                                    <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="foto" value="" accept=".png, .jpeg, .jpg">
                                    <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                                </div>
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