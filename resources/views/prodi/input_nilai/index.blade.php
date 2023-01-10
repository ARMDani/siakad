@extends('template.home')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Penginputan Nilai Mahasiswa</h3>
      </div>
    </div>

    {{-- BEGIN CONTENT --}}
    <div class="content">

      {{-- BEGIN CONTAINER --}}
      <div class="container-fluid">

        <div class="row">

          {{-- begin col 1 --}}
          <div class="col">

            {{-- begin card --}}
            <div class="card">
              <div class="card-header"></div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-12">

                      {{-- BEGIN FORM  --}}
                      <form action="/nilai" method="post">
                        {{ csrf_field() }} 
                        <div class="form-group row">
                          <label for="staticEmail" class="col-2 col-form-label">Program Studi</label>
                          <div class="col-3">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Pendidikan teknologi Informasi">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="tahun_akademik_id" required="required">
                                <option value="">- Pilih Tahun Akademik -</option>
                                @foreach ($academic_year as $data)
                                @if ($data->id==$tahun_akademik)
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
                        </div>
                       
                         <div class="col">
                           <button type="submit" class="btn btn-success center-block align-bottom ">Refresh</button>
                         </div>
                        </div>
                      </form>
                      {{-- AND FORM --}}
                    
                    </div>
                  </div>
                  
              </div>
            </div>
          
          </div>
          {{-- end col 1--}}
          

        </div>

      
        {{-- BEGIN ROW 2 --}}
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                  <form action="/nilai/store" method="post">
                    {{ csrf_field() }}
                  @if(count($mahasiswa))
                    <div class="row">
                        @foreach ($academic_year as $data)
                        @if ($data->id==Request::segment(3)) 
                        <h1 selected value="{{$data->id}}">
                          {{$data->name}}
                          </h1> 
                        @endif
                        @endforeach
                      </div>
                    <div class="row">
                      <div class="col">
                      
                      @endif
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead class="text-center">
                        <tr>
                          <th>Opsi</th>
                          <th>No</th>
                          <th>Kode MK</th>
                          <th>Mata Kuliah</th>
                          <th>JML Mahasiswa</th>
                          <th>SKS</th>
                          <th>Ruangan</th>
                          <th>Semester</th>
                          <th>Jam Kuliah</th>
                          <th>Dosen Pengajar</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <?php $no = 1  ?>
                        @foreach ($mahasiswa as $mhs)
                        <tr>
                          <td> 
                              <div class="col">
                                <a href="/nilai/input_nilai" type="submit" class="btn btn-success center-block align-bottom " value="Input Nilai">Input Nilai</a>
                              </div>
                          </td> 
                          <td>{{ $no }}</td>
                          <td>{{ $mhs->subject_course->course_code }}</td>
                          <td>{{ $mhs->subject_course->name }}</td>
                          <td>
                            <div class="col">
                              <button type="submit" class="btn btn-success center-block align-bottom ">Jumlah Mahasiswa</button>
                            </div>
                          </td>
                          <td>{{ $mhs->subject_course->sk }}</td>
                          <td>{{ $mhs->academic_room->name }}</td>
                          <td>{{ $mhs->subject_course->sk }}</td>
                          <td>{{ $mhs->academic_room->name }}</td>  
                          <td>{{ $mhs->lecturer->name }}</td>                           
                         
                         
                        </tr>
                        <?php $no++ ?>
                        @endforeach


                    </table>
                      </tbody>
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