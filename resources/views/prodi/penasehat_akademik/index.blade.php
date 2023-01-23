@extends('template.home')

@section('content')

<div class="content-wrapper">
    
    {{-- BEGIN CONTENT --}}
    <div class="content">

      {{-- BEGIN CONTAINER --}}
      <div class="container-fluid">
        <div class="row">            {{-- begin card --}}
          {{-- @forelse ($mahasiswas as $mhs) --}}
              <div class="card-body col-12">
                <h3>Daftar Mahasiswa PA </h3> 
              </div>
              {{-- @endforeach --}}
              
            </div>
          
          </div>
          {{-- end col 1--}}

        {{-- BEGIN ROW 2 --}}
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                    {{-- <form action="/nilai/store/{{ Request::segment(3) }}" method="post">
                      {{ csrf_field() }} --}}
                    <div class="row">
                     
                    <div class="row">
                      <div class="col">
                        <a href="/leactureprodi" class="btn btn-danger mb-3" type="submit">Kembali</a>
                        <a href="/penasehat/create/{{ $dosen }}" class="btn btn-success mb-3" type="submit">Tambah Data</a>
                      </div>
                     
                    </div>
                      {{-- @endif --}}
                      <table class="table table-bordered table-hover table-wrapper">
                        <thead>
                          <tr class="text-center bg-light">
                            <th class="tg-6h80" rowspan="4">No</th>
                            <th class="tg-6h95" rowspan="4">Nama</th>
                            <th class="tg-6h95" rowspan="4">NIM</th>
                            <th class="tg-6h95" rowspan="4">Angkatan</th>
                            <th class="tg-6h95 text-center">Berkas I</th>
                            <th class="tg-k7qf">Berkas II</th>
                            <th class="tg-k7qf">#Opsi</th>
                          </tr>
                        </thead>
                        <tbody>

                          {{-- <form action="/nilai/store" method="post">
                            {{ csrf_field() }} --}}
                          
                        @foreach ($daftarmhs as $daftar)
                        <?php $no = 1  ?>
                        <tr class="text-center ">
                          <input type="hidden" class="nilai" name="id[]" value="">
                          <td>{{ $no }}</td>
                          <td class="tg-3xi5">{{ $daftar->name }}</td>
                          <td class="tg-3xi5">{{ $daftar->nim }}</td>
                          <td class="tg-3xi5">{{ $daftar->student->generations->name }}</td>
                          <td>
                            <div class="form-group">
                              <div class="">
                              <a class="btn btn-primary" href="/krs/pdf/"><i class="fas fa-print"></i> Lihat KRS</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <div class="">
                              <a class="btn btn-primary" href="/khs/pdf/"><i class="fas fa-print"></i> Lihat KHS</a>
                              </div>
                            </div>
                          </td>
                          <td>
                            <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                     
                        <?php $no++ ?>
                    
                        @endforeach
                       </tbody>
                  
                      </table>
                      <div class="d-flex">
                      </div>
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

















  