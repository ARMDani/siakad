@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Data Mata Kuliah</h3>
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
                    @foreach ($course as $course)
                    <form action="/matakuliah/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $course->id }}">
                    <div class="form-group">
                        <label>Kode Mata Kuliah<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="number" required="required" name="course_code" value="{{ $course->course_code }}">
                    </div>
                    <div class="form-group">
                        <label>Nama<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="text" required="required" name="name" value="{{ $course->name }}">
                    </div>
                    <div class="form-group">
                        <label>SKS<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="number" required="required" name="sk" value="{{ $course->sk }}">
                    </div>
                    <div class="form-group">
                        <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                        <input class="form-control" type="number" required="required" name="semester" value="{{ $course->semester }}">
                    </div>
                    <div class="form-group">
                        <label>Dosen<span class="required" style="color: #dd4b39;">*</span></label>
                        <select class="form-control" name="lecturer_id" required="required">
                            @foreach ($leacture as $data)
                            <option value="{{$data->id}}" <?php echo $data->id == $course->lecturer_id ? 'selected' : ' ';  ?>>
                                {{$data->name}}
                            </option>
                            @endforeach 
                            </select>
                    </div>
                <input class="btn btn-secondary" type="submit" value="Simpan Data">
                <a href="/matakuliah" class="btn btn-danger">Kembali</a>
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