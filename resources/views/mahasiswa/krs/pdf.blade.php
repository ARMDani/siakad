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
<h3>KARTU RENCANA STUDI</h3>
<br>

@foreach($krs as $mhs)
<table border="0" width="100%">
    <tr class="text-center">
        <td width="35%"><b>Nama</b></td>
        <td>: <?= $mhs->name ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>NIM</b></td>
        <td>: <?= $mhs->nim ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>Semester</b></td>
        <td>: <?= $mhs->study_value->lecture_schedulings->subject_course->semester ?></td>
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
        <tr>
            <th class="text-center">No.</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Selesai</th>
            <th>Dosen</th>
            <th>Kelas</th>

        </tr>
    </thead>
      <?php $no = 1  ?>
      @foreach($krs as $mk)
      <tr class="text-center">
        <td class="text-center"><?= $no ?></td>
        <td>
            <?= $mk->lecture_schedulings->subject_course->name ?>
        </td>
        <td class="text-center">
            <?= $mk->lecture_schedulings->subject_course->sk ?>
        </td>
        <td class="text-center">
            <?= $mk->lecture_schedulings->academic_day->name ?>
        </td>
        <td class="text-center">
            <?= $mk->lecture_schedulings->start_time ?>
        </td>
        <td class="text-center">
            <?= $mk->lecture_schedulings->hour_over ?>
        </td>
        <td class="text-center">
            <?= $mk->lecture_schedulings->lecturer->name ?>
        </td>
        <td class="text-center">
            <?= $mk->lecture_schedulings->class->name ?>
        </td>
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