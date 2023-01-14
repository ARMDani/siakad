@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Mata Kuliah</h3>
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
                    <form action="/matakuliah/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Kode Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="course_code"placeholder="Masukkan Kode Mata Kuliah  ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Mata Kuliah ..." type="text" name="nama" required="required">
                        </div>
                        <div class="form-group">
                            <label>SKS<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="sk"placeholder="Masukkan SKS  ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="semester"placeholder="Masukkan Semester  ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Dosen<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="lecturer_id" required="required">
                                <option value="">- Dosen -</option>
                                @foreach ($leacture as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach 
                            </select> 
                        </div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/matakuliah" class="btn btn-danger">Kembali</a>
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