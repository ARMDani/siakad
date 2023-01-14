@extends('template.home')

@section('content')

<div class="content-wrapper">
    
    {{-- BEGIN CONTENT --}}
    <div class="content">

      {{-- BEGIN CONTAINER --}}
      <div class="container-fluid">
        <div class="row">            {{-- begin card --}}
             
              <div class="card-body col-12">
                <h3>Penginputan Nilai Mahasiswa Mata Kuliah</h3> 
              </div>
            </div>
          
          </div>
          {{-- end col 1--}}

        {{-- BEGIN ROW 2 --}}
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                  <form action="/nilai/store" method="post">
                    {{ csrf_field() }}
                      {{-- @if(count($mahasiswas)) --}}
                    <div class="row">
                     </div>
                    <div class="row">
                      <div class="col">
                        <a href="/nilai" class="btn btn-danger mb-3" type="submit">Kembali</a>
                      </div>
                    </div>
                      {{-- @endif --}}
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead>
                        <tr class="text-center">
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Nilai Tugas</th>
                          <th>UTS</th>
                          <th>UAS</th>
                          <th>Grade</th>
                          <th>#Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1  ?>
                        @foreach ($mahasiswas as $mhs)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $mhs->student->nim }}</td>
                          <td>{{ $mhs->student->name }}</td>
                        </td>
                        <td>  
                          <input class="form-control" type="number" value="{{ $mhs->assignment_value }}" name="nilai[{{ $mhs->id }}][assignment_value]" placeholder="Masukkan nilai ..." required="required">
                          <input type="hidden" name="id_nilaimhs" value="{{ $mhs->student_id  }}">
                          <input type="hidden" name="jadwal" value="{{ $mhs->lecture_schedulings_id }}">
                          <input type="hidden" name="matakuliah" value="{{ $matakuliah }}">

                        </td>
                        <td>
                          <input class="form-control"  type="number" value="{{ $mhs->uts_value }}" name="nilai[{{ $mhs->id }}][uts_value]" placeholder="Masukkan nilai ..." required="required">
                       
                        </td>
                        <td>
                          <input class="form-control" type="number" value="{{ $mhs->uas_value }}" name="nilai[{{ $mhs->id }}][uas_value]" placeholder="Masukkan nilai ..." required="required">
                          <input type="hidden" name="nilai[{{ $mhs->id }}][id_nilaimhs]" value="{{ $mhs->id_nilaimhs  }}">
                        </td>
                      <td>
                        <button class="btn btn-success center-block align-bottom " placeholder="...">{{ ($mhs->grade!=null)?$mhs->grade->name: " " }}</button>
                      </td>
                      <td>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                           
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

















  