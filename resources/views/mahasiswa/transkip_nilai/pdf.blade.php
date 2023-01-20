<div class="row">
    <div class="col">
        <div class="text-center" style="margin-bottom: 10px;">
            <img src="{{ public_path('dist/img/kop.png')  }}" alt="gambar logo" width="650px">
        </div>
    </div>
</div>
<style>
h3 {
text-align: center;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}
</style>
<hr>
<h3>KARTU HASIL STUDI</h3>
<br>

@foreach($nilai as $mhs)
<table border="0" width="100%">
    <tr class="text-center">
        <td width="35%"><b>Nama</b></td>
        <td>: <?= $mhs->student->name ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>NIM</b></td>
        <td>: <?= $mhs->student->nim ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>Semester</b></td>
        <td>: <?= $mhs->lecture_schedulings->subject_course->semester ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>Jurusan/Program Studi</b></td>
        <td>: <?= $mhs->student->study_program->name ?></td>
    </tr>
</table>

@endforeach 

<br><br>
<div style="overflow-x:auto;">
    <table>
    <thead >
      <tr  class="text-center">
        <th class="tg-6h95  text-center" rowspan="2">No</th>
        <th class="tg-6h95  text-center" rowspan="2">Kode</th>
        <th class="tg-6h95  text-center" rowspan="2" >Mata Kuliah</th>
        <th class="tg-6h95  text-center" rowspan="2">SKS</th>
        <th class="text-center" colspan="18">Nilai</th>
      </tr>
      <tr>
        <td class="tg-k7qf  text-center">Bobot</td>
        <td class="tg-k7qf  text-center">Nilai</td>
        <td class="tg-k7qf  text-center">Huruf</td>
      </tr>
    </thead>
      <?php $no = 1  ?>
      @foreach($nilai as $mhs)
      <tr >
        <td class="tg-3xi5 text-center">{{ $no }}</td>
        <td class="tg-3xi5 text-center">{{ $mhs->lecture_schedulings->subject_course->course_code }}</td>
        <td class="tg-3xi5 text-center">{{ $mhs->lecture_schedulings->subject_course->name }}</td>
        <td class="text-center">{{ $mhs->lecture_schedulings->subject_course->sk}}</td>
        <td class="text-center">{{ $mhs->grade->bobot}}</td>
        <td class="text-center">{{ $mhs->final_score}}</td>
        <td class="text-center">{{ $mhs->grade->name}}</td>
    </tr>
      <?php $no++ ?>
      @endforeach
  </table>
</div>

<br><br><br><br>
<u></u><br>
<table width="100%">
    <tr>
        <td>
            Jumlah SKS : <b></b>
        </td>
        <td style="text-align: right;">
            Kendari, <?= date('d - m - Y') ?>
        </td>
    </tr>
</table>
<table class="table" style="width:100%">
    <thead>
        <tr>
            <th><b>Menyetujui</b></th>
            <th style="text-align: right;" width="100%"><b>Mengetahui</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%">
                Mahasiswa,
                <br><br><br><br>
                <u></u><br>
                {{-- <?= $nilai->student->name ?> --}}
            </td>
            <td style="text-align: right; width:50%;">
                Penasehat Akademik
                <br><br><br><br>
                <u></u><br>
                NIDN/NIDK.
            </td>
        </tr>
    </tbody>
</table>
<table width="100%">
    <tr>
        <td style="text-align: center;">
            Ketua Jurusan/Program Studi
            <br><br><br><br>
            <u></u><br>
            NIDN/NIDK. 
        </td>
    </tr>
</table>