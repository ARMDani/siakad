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
                            @foreach ($student as $students)
                            <form action="/student/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $students->id }}"> <br/>
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="text" required="required" name="name" value="{{ $students->name }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="number" required="required" name="nim" value="{{ $students->nim }}"> <br/>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="gender">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" <?php echo "Laki-Laki" == $students->gender ? 'selected' : ' ';  ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo "Perempuan" == $students->gender ? 'selected' : ' ';  ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="religion">
                                        <option value="">- Pilih Agama -</option>
                                        <option value="Islam" <?php echo "Islam" == $students->religion ? 'selected' : ' ';  ?>>Islam</option>
                                        <option value="Hindu" <?php echo "Hindu" == $students->religion ? 'selected' : ' ';  ?>>Hindu</option>
                                        <option value="Kristen" <?php echo "Kristen" == $students->religion ? 'selected' : ' ';  ?>>Kristen</option>
                                        <option value="Protestan" <?php echo "Protestan" == $students->religion ? 'selected' : ' ';  ?>>Protestan</option>
                                        <option value="Katolik" <?php echo "Katolik" == $students->religion ? 'selected' : ' ';  ?>>Katolik</option>
                                        <option value="Budha" <?php echo "Budha" == $students->religion ? 'selected' : ' ';  ?>>Budha</option>
                                        <option value="Konghucu" <?php echo "Konghucu" == $students->religion ? 'selected' : ' ';  ?>>Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="study_program_id">
                                        <option value="">- Pilih Program Studi -</option>
                                        @foreach ($study_program as $data)
                                        <option value="{{$data->id}}" <?php echo $data->id == $students->study_program_id ? 'selected' : ' ';  ?>>
                                            {{$data->name}}
                                        </option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Asal Daerah<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="districts_id">
                                    @foreach ($districts as $data)
                                    <option value="{{$data->id}}" <?php echo $data->id == $students->districts_id ? 'selected' : ' ';  ?>>
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="class_id">
                                        @foreach ($class as $data)
                                        <option value="{{$data->id}}" <?php echo $data->id == $students->class_id ? 'selected' : ' ';  ?>>
                                            {{$data->name}}
                                        </option>
                                        @endforeach 
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="generations_id">
                                        @foreach ($generations as $data)
                                        <option value="{{$data->id}}" <?php echo $data->id == $students->generations_id ? 'selected' : ' ';  ?>>
                                            {{$data->name}}
                                        </option>
                                        @endforeach 
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label">Foto<span class="required" style="color: #dd4b39;">*</span></label>
                                    <div class="">
                                        <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="{{ $students->photo }}" accept=".png, .jpeg, .jpg"><br/>
                                        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                                    </div>
                                </div>


                                {{-- <div class="form-group">
                                    <label>Foto<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input type="file" required="required" name="photo" value="{{ $students->photo }}"> <br/>
                                </div> --}}
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