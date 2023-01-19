@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data User</h3>
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
                    @foreach ($pengguna as $penggunas)
                    <form action="/user/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $penggunas->id }}">
                        <div class="form-group">
                          <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="name" value="{{ $penggunas->name }}">
                        </div>
                        <div class="form-group">
                          <label>Username<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="username" value="{{ $penggunas->username }}">
                        </div>
                        <div class="form-group">
                          <label>Password<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="password" value="{{ $penggunas->password }}">
                        </div>
                        <div class="form-group">
                          <label>Email<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="email" value="{{ $penggunas->email }}">
                        </div>
                        <div class="form-group">
                          <label>Role<span class="required" style="color: #dd4b39;">*</span></label>
                          <select class="form-control" name="roles" required="required">
                              <option value="">- Pilih Role -</option>
                              @foreach ($roles_id as $data)
                              <option value="{{$data->id}}" <?php echo $data->id == $penggunas->roles_id ? 'selected' : ' ';  ?>>
                                  {{$data->name}}
                              </option>
                              @endforeach 
                          </select>
                      </div>
                        <input class="btn btn-secondary" type="submit" value="Simpan Data">
                        <a href="/user" class="btn btn-danger">Kembali</a>
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