@extends('template.home')

@section('content')
<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Kartu Hasil Studi</p>
    <div class="row">   
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="/khsmahasiswa" method="post">
              {{ csrf_field() }} 
              <div class="form-group row">
                <div class="card col-5" style="width: 18rem;">
                  <?php 
                  $id_angkatan = $mahasiswa->generations_id;
                  $id_mahasiswa = $mahasiswa->id;
                  ?>
                  <ul class="list-group list-group-flush">
                    {{-- @foreach ($mahasiswa as $datas) --}}
                    <li class="list-group-item"><b>NIM : </b> {{ $mahasiswa->nim }}</li>
                    <li class="list-group-item"><b>Nama : </b> {{ $mahasiswa->name }}</li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> {{ $mahasiswa->study_program->name }}</li>
                    
                   
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
          </form>
          </div>

            <input type="hidden" name="tahun_akdemik" value="{{ $tahun_akademik}}">
        </div>
      </div>
    </div>        
      {{-- -------------------------------------tabel jadwal----------------------------------------------------------------------- --}}


 <div class="col-12">  
 <div class="card">
 <div class="card-body">
  <div>
  <a href="/khsmahasiswa/pdf/{{ $id_mahasiswa }}/{{ $tahun_akademik }}/{{ $id_angkatan }}" class="btn btn-success">Cetak KHS</a> 
</div>  
<br> 
    <form action="/khsmahasiswa/storemahasiswa" method="POST" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}
        <table class="table table-bordered table-hover table-wrapper">
          <thead>
            <tr>
              <th class="tg-6h95  text-center" rowspan="2">No</th>
              <th class="tg-6h95  text-center" rowspan="2">Kode</th>
              <th class="tg-6h95  text-center" rowspan="2" >Mata Kuliah</th>
              <th class="tg-6h95  text-center" rowspan="2">SKS</th>
              <th class="tg-k7qf text-center" colspan="18">Nilai</th>
            </tr>
            <tr>
              <td class="tg-k7qf  text-center">Bobot</td>
              <td class="tg-k7qf  text-center">Nilai</td>
              <td class="tg-k7qf  text-center">Huruf</td>
            </tr>
          </thead>
            <?php $no = 1;
            $totalSksMk = 0;
            $totalBobotKaliSks = 0;
            $ips = 0;
            ?>
            @foreach ($khsmahasiswa as $khsmahasiswas)
            <tr >
              <td class="tg-3xi5 text-center">{{ $no }}</td>
              <td class="tg-3xi5 text-center">{{ $khsmahasiswas->lecture_schedulings->subject_course->course_code }}</td>
              <td class="tg-3xi5 text-center">{{ $khsmahasiswas->lecture_schedulings->subject_course->name }}</td>
              <td class="text-center">{{ $khsmahasiswas->lecture_schedulings->subject_course->sk}}</td>
              <td class="text-center">{{  ($khsmahasiswas->grade) ? ($khsmahasiswas->grade->bobot) : 'Belum Dinilai'}}</td>
              <td class="text-center">{{ $khsmahasiswas->final_score}}</td>
              <td class="text-center">{{  ($khsmahasiswas->grade) ? ($khsmahasiswas->grade->name) : 'Belum Dinilai'}}</td>
          </tr>
            <?php
            $sks = $khsmahasiswas->lecture_schedulings->subject_course->sk;
            $bobot = ($khsmahasiswas->grade) ? ($khsmahasiswas->grade->bobot) : 0;

            $totalSksMk += $sks;
            $totalBobotKaliSks += ($bobot * $sks);
            $ips = $totalBobotKaliSks / $totalSksMk;

            $no++ ?>
            @endforeach
        </table>
        <p>IPS (Indeks Prestasi Sementara) : {{ $ips }}</p>
        <p>IPK (Indeks Prestasi Kumulatif) :</p>
    </form>
  </div>
 </div>
</div>
</div>
</div>
        <!-- /.card-body -->
@endsection 
