@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Mahasiswa</h3>
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
                    <form action="/student/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama ..." type="text" name="nama" required="required">
                        </div>
                        <div class="form-group">
                            <label>Nim<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="nim" placeholder="Masukkan Nim ..." required="required">
                        </div>
                        <div class="form-group ">
                            <label>Jenis Kelamin<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="gender" name="group_id" required="required">
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <option value="1" >Laki-Laki</option>
                                    <option value="0" >Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Agama<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="agama" name="group_id" required="required">
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
                            <select class="form-control" name="program_studi" required="required">
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
                            <select class="form-control" name="asal_daerah" required="required">
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
                           <select class="form-control" name="kelas" required="required">
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
                            <select class="form-control" name="angkatan" required="required">
                                <option value="">- Angkatan -</option>
                                @foreach ($generations as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach 
                            </select>
                        </div>
                        <input type="hidden" id="lecturer_id" name="lecturer_id" class="post-id" value="2">
                        <div class="form-group">
                            <label class=" control-label">Photo<span class="required" style="color: #dd4b39;">*</span></label>
                            <div class="">
                                <input type="file" class="form-control" placeholder="Cover/Thumbnail Informasi" name="photo" value="" accept=".png, .jpeg, .jpg" required="required">
                                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span>
                            </div>
                        </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/student" class="btn btn-danger">Kembali</a>
                    </form>
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