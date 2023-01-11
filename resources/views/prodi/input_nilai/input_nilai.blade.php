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
                        <input class="btn btn-primary mb-3" type="submit" value="Simpan">
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
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1  ?>
                        @foreach ($mahasiswas as $mhs)
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $mhs->student->nim }}</td>
                          <td>{{ $mhs->student->name }}</td>
                          <td>
                            <input class="form-control" type="number">
                          </td>
                          <td>
                            <input class="form-control" type="number">
                          </td>
                          <td>
                            <input class="form-control" type="number">
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

















  