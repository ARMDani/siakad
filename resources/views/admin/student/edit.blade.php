@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Mahasiswa</h3>
      </div>
    </div>
  
    {{-- BEGIN CONTENT --}}
    <div class="content">
  
      {{-- BEGIN CONTAINER --}}
      <div class="container-fluid">
     
        {{-- BEGIN ROW 2 --}}
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    @foreach ($student as $students)
                    <form action="/student/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $students->id }}">
                                <div class="form-group">
                                    <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="text" required="required" name="name" value="{{ $students->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                                    <input class="form-control" type="number" required="required" name="nim" value="{{ $students->nim }}">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="gender" required="required">
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" <?php echo "Laki-Laki" == $students->gender ? 'selected' : ' ';  ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo "Perempuan" == $students->gender ? 'selected' : ' ';  ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="religion" required="required">
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
                                    <select class="form-control" name="study_program_id" required="required">
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
                                    <select class="form-control" name="districts_id" required="required">
                                    <option value="">- Pilih Asal Daerah -</option>
                                    @foreach ($districts as $data)
                                    <option value="{{$data->id}}" <?php echo $data->id == $students->districts_id ? 'selected' : ' ';  ?>>
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelas<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="class_id" required="required">
                                        <option value="">- Pilih Kelas -</option>
                                        @foreach ($class as $data)
                                        <option value="{{$data->id}}" <?php echo $data->id == $students->class_id ? 'selected' : ' ';  ?>>
                                            {{$data->name}}
                                        </option>
                                        @endforeach 
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                                    <select class="form-control" name="generations_id" required="required">
                                        <option value="">- Pilih Angkatan -</option>
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
                                        <input lass="form-control" type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="{{ $students->photo }}" accept=".png, .jpeg, .jpg" required="required"><br/>
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
  
        {{-- END ROW 2 --}}
  
      </div>
      {{-- END CONTAINER --}}
  
    </div>
    {{-- END CONTENT --}}
   
  </div>

@endsection