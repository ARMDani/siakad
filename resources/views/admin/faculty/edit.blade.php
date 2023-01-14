@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Fakultas</h3>
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
                    @foreach ($faculty as $faculti)
                    <form action="/fakultas/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $faculti->id }}">
                        <div class="form-group">
                        <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="code_faculty" value="{{ $faculti->code_faculty }}">
                        </div>
                        <div class="form-group">
                        <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="{{ $faculti->name }}">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Simpan Data">
                        <a href="/fakultas" class="btn btn-danger">Kembali</a>
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