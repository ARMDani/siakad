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
                <h3>Penginputan Nilai Mahasiswa Mata Kuliah {{ $mahasiswas[0]->lecture_schedulings->subject_course->name }}</h3> 
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
                          <tr>
                            <th class="tg-6h95" rowspan="4">No</th>
                            <th class="tg-6h95" rowspan="4">Nim</th>
                            <th class="tg-6h95" rowspan="4">Nama</th>
                            <th class="tg-k7qf text-center" colspan="18">Nilai</th>
                          </tr>
                          <tr class="ng-light">
                            <td class="tg-k7qf">Tugas</td>
                            <td class="tg-k7qf">UTS</td>
                            <td class="tg-k7qf">UAS</td>
                            <td class="tg-k7qf">Grade</td>
                          </tr>
                        </thead>
                        <tbody>

                          <form action="/nilai/store/{{ Request::segment(3) }}" method="post">
                            {{ csrf_field() }}
                          
                    
                        @forelse ($mahasiswas as $mhs => $item)
                        <?php $no = 1  ?>
                          <tr>
                            <input type="hidden" class="nilai" name="id[]" value="{{ old('id') ? old('id') : $item->id }}">
                            <td>{{ $no }}</td>
                            <td class="tg-3xi5">{{ $item->student->nim}}</td>
                            <td class="tg-3xi5">{{ $item->student->name }}</td>
                           <td class="tg-3xi5">
                              <input type="number" class="nilai" name="assignment_value[]" required max="89" value="{{ old('assignment_value') ? old('assignment_value') : $item->assignment_value }}">
                            </td>
                            <td class="tg-3xi5">
                              <input type="number" class="nilai" name="uts_value[]"  required max="89" value="{{ old('uts_value') ? old('uts_value') : $item->uts_value }}">
                            </td>
                            <td class="tg-3xi5">
                              <input type="number" class="nilai" name="uas_value[]"  required max="89" value="{{ old('uas_value') ? old('uas_value') : $item->uas_value }}">
                            </td>
                            <td class="tg-3xi5">{{($item->grade_id == null) ? "-" : $item->grade->name }}</td>
                          </tr>
                          @empty
                          <tr>
                            <td>
                              Mahasiswa Belum Mengambil KRS
                            </td>
                          </tr>
                          <?php $no++ ?>
                          @endforelse
                        </tbody>
                  
                      </table>
                      <div class="d-flex">
                        <button type="submit" class="btn btn-success ml-auto">Simpan Nilai</button>
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

















  