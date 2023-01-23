@extends('template.home')
@section('content')
<html>
<head>
        <title>Tambah Mahasiswa Perwalian</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
 </head>
 <body>
    <div class="content-wrapper">
        <div class="col-sm-12">
         <div class="card">
          <div class="card-body">
           <h3>Tambah Mahasiswa Perwalian </h3>
           <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="row">
                  <div class="col-12">

                    {{-- BEGIN FORM  --}}
                    <form action="/penasehat/create/{{ $dosen }}" method="post">
                      {{ csrf_field() }} 
                      <div class="form-group row">
                        <label class="">Pilih Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                        <div class="col-3">
                          <select class="form-control" name="angkatan_id" required="required">
                            <option value="">- Angkatan -</option>
                            @foreach ($generations as $data)
                            @if ($data->id==$angkatan)
                            <option selected value="{{$data->id}}">
                              {{$data->name}}
                              </option> 
                            @else
                            <option value="{{$data->id}}">
                              {{$data->name}}
                              </option> 
                            @endif
                            @endforeach 
                        </select>
                       </div>
                       <div class="col">
                         <button type="submit" class="btn btn-success center-block align-bottom ">Refresh</button>
                       </div>
                      </div>
                    </form>
                    {{-- AND FORM --}}
                  
                  </div>
                </div>


            <form action="/penasehat/store/" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
              
                      <table class="table table-bordered table-hover table-wrapper">
          
                        <thead>
                          <tr class="text-center">
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Angkatan</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                                                  
                          </tr>
                        </thead>
                        <tbody>
                      
                          <?php $no = 1  ?>
                          @foreach ($mahasiswa as $data)
                                                   
                          <tr>
                            <td class="text-center">
                             <input name="pilih[]" value="{{ $data->id }}" type="checkbox" >
                               <input name="dosen[{{ $dosen }}]" value="{{ $dosen }}" type="hidden">
                            </td>

                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td class="text-center">{{ $data->gender }}</td>
                            <td class="text-center">{{ $data->generations->name }}</td>
                            <td class="text-center">{{ $data->class->name }}</td>
                            <td class="text-center">{{ $data->semester }}</td>
                                        
                        </tr>
                        </tbody>
                        @endforeach
                       
                        <?php $no++ ?>
                    
                      </table>
                      <br>
                      <input class="btn btn-primary" type="submit" value="Simpan Data">
                            
                      <a href="/penasehat/{{ Request::segment(3) }}" class="btn btn-danger">Kembali</a>
                    </form>
                   </div>
                  </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
       
    </body>
</html>

@endsection