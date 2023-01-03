@extends('template.home')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Pengaturan SKS Mahasiswa</h3>
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
                      <form action="/sksmhs" method="post">
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
                              @foreach ($academikyear as $data)
                              <option value="{{$data->id}}">
                                  {{$data->academic_year}}
                              </option>
                              @endforeach 
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="angkatan" required="required">
                                <option value="">-  Pilih Angkatan -</option>
                                @foreach ($generation as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
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
                  
              </div>
            </div>
            {{-- end card --}}

          </div>
          {{-- end col 1--}}
          

        </div>

        <?php 
        $tahun_akademik = $params['tahun_akademik'];
        $angkatan = $params['angkatan'];
        ?>
        {{-- BEGIN ROW 2 --}}
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                  <form action="/sksmhs/store" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="tahun_akademik" value="{{ ($tahun_akademik != null) ? $tahun_akademik->id : null  }}">
                    @if($angkatan != null)
                    <div class="row">
                      <h5>Pengaturan SKS Mahasiswa Angkatan {{  $angkatan->name }} Tahun Akademik {{ $tahun_akademik->academic_year }}  - Semester {{ (($tahun_akademik->semester % 2 == 1)? "Ganjil" : "Genap") }}</h5>
                    </div>
                    <div class="row">
                      <div class="col">
                        <input class="btn btn-primary mb-3" type="submit" value="Simpan">
                      </div>
                    </div>
                      @endif
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>SKS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1  ?>
                        @foreach ($mahasiswa as $mhs)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $mhs->nim }}</td>
                          <td>{{ $mhs->name }}</td>
                          <td>
                            <div class="form-group">
                              <input class="form-control" type="number" value="{{ $mhs->sks }}" name="sks[{{ $mhs->id }}][jumlah_sks]" placeholder="Masukkan SKS ..." required="required">
                              <input type="hidden" name="sks[{{ $mhs->id }}][id_sksmhs]" value="{{ $mhs->id_sksmhs  }}">
                            </div>
                          </td> 
                        </tr>
                        <?php $no++ ?>
                        @endforeach

                      </tbody>

                    </table>
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

















  