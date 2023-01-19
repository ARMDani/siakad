@extends('template.home')

@section('content')

<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Jadwal Mengajar</p>
    <div class="row">      
      <div class="col-sm">
        <div class="card">
          <div class="card-body">
              <div class="form-group row">
                <div class="card col-8" style="width: 18rem;">
                  <form action="/dosen" method="post">
                    {{ csrf_field() }}
                  @foreach ($lecturer as $data)
                  <ul class="list-group list-group-flush" value="{{ $data->id }}">
                    <li class="list-group-item"><b>NIDN : </b> {{ $data->nidn}} </li>
                    <li class="list-group-item"><b>Nama : </b> {{ $data->name }} </li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> {{ $data->study_program->name }}</li>
                    @endforeach
                    
                  </ul>                 
                </div>
              </div>
              <div class="form-group row">
                <label class="col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                <li class="list-group ml-2"> 
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
              </li>
            </ul>
            <br>
            <button type="submit" class="btn btn-primary" >Refresh</button>
         
          </div>
          </div>
          <form action="/dosen/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            {{-- <input type="hidden" name="tahun_akdemik" value="{{}}"> --}}
        </div>
      </div>
    </div>        
      {{-- -------------------------------------tabel jadwal----------------------------------------------------------------------- --}}
     <div class="card">
      <div class="card-body">
      <div>
      <a href="#" class="btn btn-warning ml-2 mb-2">-Cetak-</a>
      </div>
        <table class="table table-bordered table-hover table-wrapper">
            <tr class="text-center  bg-light text-dark">
              <th>No</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam Kuliah</th>
              <th>Selesai Kuliah</th>
              <th>Ruangan</th>
            </tr>
            <?php $no = 1  ?>
            @foreach ($dosenjadwal as $jadwal)
            <tr class="text-center" value="{{ $jadwal->id }}">
                <td>{{ $no++ }}</td>
                <td>{{$jadwal->subject_course->name }}</td>
                <td>{{$jadwal->subject_course->sk }}</td>
                <td>{{$jadwal->class->name }}</td>
                <td>{{$jadwal->academic_day->name }}</td>
                <td>{{$jadwal->start_time }}</td>
                <td>{{$jadwal->hour_over }}</td>
                <td>{{$jadwal->academic_room->name }}</td>
            </tr>
            @endforeach
            
      
        </table>
      </form>
    </div>
    </div>
    </div>
  </div>
       
@endsection 
