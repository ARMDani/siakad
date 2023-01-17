@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Data User</h3>
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
                    <form action="/user/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="code_faculty"placeholder="Masukkan Nama ..." required="required">
                        </div>
                        <div class="form-group">
                            <label>Username<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Username ..." type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                          <label>Password<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="password" name="password"  placeholder="Masukkan Password..." />
                        </div>
                        <div class="form-group">
                          <label>Email<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="email" name="email" placeholder="Masukan Email..." type="text" name="name" required="required">
                        </div>
                        <div class="form-group">
                          <label>User<span class="required" style="color: #dd4b39;">*</span></label>
                          <select class="form-control" name="roles" required="required">
                              <option value="">- Pilih Roles -</option>
                              @foreach ($roles_id as $data)
                              <option value="{{$data->id}}">
                                  {{$data->name}}
                              </option>
                              @endforeach 
                          </select>
                        </div>
                            <input class="btn btn-success" type="submit" value="Simpan Data">
                            <a href="/user" class="btn btn-light">Kembali</a>
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