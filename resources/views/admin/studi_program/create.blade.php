@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data Program Studi</h3>
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
                    <form action="/prodi/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="code_prodi"placeholder="Masukkan Code ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Nama ..." type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                                <label>Fakultas<span class="required" style="color: #dd4b39;">*</span></label>
                                <select class="form-control" name="study_faculty" required="required">
                                    <option value="">- Pilih Fakultas -</option>
                                    @foreach ($study_faculty_id as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                    @endforeach 
                                </select>
                            	</div>
                            <input class="btn btn-secondary" type="submit" value="Simpan Data">
                            <a href="/prodi" class="btn btn-danger">Kembali</a>
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