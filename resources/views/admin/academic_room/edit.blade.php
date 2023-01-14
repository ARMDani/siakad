@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Ruangan</h3>
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
                    @foreach ($room as $rooms)
                    <form action="/ruangan/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $rooms->id }}">
                        <div class="form-group">
                        <label>Code<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="code_room" value="{{ $rooms->code_room }}">
                        </div>
                        <div class="form-group">
                        <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="{{ $rooms->name }}">
                        </div>
                        <input class="btn btn-secondary" type="submit" value="Simpan Data">
                        <a href="/ruangan" class="btn btn-danger">Kembali</a>
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