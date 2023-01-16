<div class="row">
    <div class="col">
        <div class="text-center" style="margin-bottom: 10px;">
            <img src="{{ public_path('dist/img/kop.png')  }}" alt="gambar logo" width="650px">
        </div>
    </div>
</div>
<hr>
<table border="0" width="100%">
    <tr class="text-center">
        <td width="35%"><b>Nama</b></td>
        <td>: <?= $krsmahasiswa[0]->students->nama ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>NIM</b></td>
        <td>: <?= $krsmahasiswa[0]->students->nim ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>Semester</b></td>
        <td>: <?= $krsmahasiswa[0]->students->nim ?></td>
    </tr>
    <tr class="text-center">
        <td width="35%"><b>Jurusan/Program Studi</b></td>
        <td>:Administrasi Kesehatan</td>
    </tr>
</table>

<table class="table" width="100%">
    <thead>
        <tr class="text-center">
            <th>No.</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Dosen</th>
            <th>Kelas</th>

        </tr>
    </thead>
    <tbody>
        {{-- <?php 
            $i = 1; 
            foreach($krsmahasiswa as $mk);
            ?> --}}
        <tr class="text-center">
            <td><?= $i ?></td>
            <td>
                <?= $mk-> ?>
            </td>
            <td>Adminnistrasi Kesehatan</td>
            <td>3</td>
            <td>Senin</td>
            <td>08.00</td>
            <td>Irma</td>
            <td>1A</td>
        </tr>
        <?php  
        $i++;
    endforeach;
        ?>
    </tbody>
</table>

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
<table class="table">
    <thead>
        <tr>
            <th><b>Menyetujui</b></th>
            <th style="text-align: right;" width="100%"><b>Mengetahui</b></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Mahasiswa,
                <br><br><br>
                <u></u><br>
                NIM.
            </td>
            <td style="text-align: right;">
                Penasehat Akademik
                <br><br><br>
                <u></u><br>
                NIDN/NIDK
            </td>
        </tr>
    </tbody>
</table>
<table width="100%">
    <tr>
        <td style="text-align: center;">
            Ketua Jurusan/Program Studi
            <br><br><br>
            <u></u><br>
            NIDN/NIDK. 
        </td>
    </tr>
</table>