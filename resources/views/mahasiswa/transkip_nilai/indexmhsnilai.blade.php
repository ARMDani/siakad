@extends('template.home')

@section('content')
<div class="content-wrapper">
<p class="h1 mt-3 ml-3">Transkip Nilai</p>
    <div class="row">   
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="/khsmahasiswa" method="post">
              {{ csrf_field() }} 
              <div class="form-group row">
                <div class="card col-5" style="width: 18rem;">
                 
                  <ul class="list-group list-group-flush">
                    @foreach ($data as $datas)
                    <li class="list-group-item"><b>NIM : </b> {{ $datas->student->nim }}</li>
                    <li class="list-group-item"><b>Nama : </b> {{ $datas->student->name }}</li>
                    <li class="list-group-item"><b>Jurusan/Program Studi : </b> {{ $datas->student->study_program->name }}</li>
                    @break
                    @endforeach
                  </ul>
                 
                </div>
              </div>
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
  <a href="#" class="btn btn-success">Cetak Transkip</a> 
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
            <?php $no = 1  ?>
            @foreach ($khsmahasiswa as $khsmahasiswas)
            <tr >
              <td class="tg-3xi5 text-center">{{ $no }}</td>
              <td class="tg-3xi5 text-center">{{ $khsmahasiswas->lecture_schedulings->subject_course->course_code }}</td>
              <td class="tg-3xi5 text-center">{{ $khsmahasiswas->lecture_schedulings->subject_course->name }}</td>
              <td class="text-center">{{ $khsmahasiswas->lecture_schedulings->subject_course->sk}}</td>
              <td class="text-center">{{ $khsmahasiswas->grade->bobot}}</td>
              <td class="text-center">{{ $khsmahasiswas->final_score}}</td>
              <td class="text-center">{{ $khsmahasiswas->grade->name}}</td>
          </tr>
            <?php $no++ ?>
            @endforeach
        </table>
    </form>
  </div>
 </div>
</div>
</div>
</div>
        <!-- /.card-body -->
@endsection 
