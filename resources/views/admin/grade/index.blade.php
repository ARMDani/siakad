@extends('template.home')

@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h3>Data Grade Nilai</h3>
    </div>
  </div>

  {{-- BEGIN CONTENT --}}
  <div class="content">

    {{-- BEGIN CONTAINER --}}
    <div class="container-fluid">
   
      {{-- BEGIN ROW 2 --}}
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="form">
                {{-- Begin Sesion --}}
                @if ($tambah = Session::get('tambah'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $tambah }}</strong>
                </div>
                @endif
                @if ($edit = Session::get('edit'))
                <div class="alert alert-primary alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $edit }}</strong>
                </div>
                @endif
                @if ($hapus = Session::get('hapus'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $hapus }}</strong>
                </div>
                @endif
                {{-- end Sesion --}}
                <div class="row">
                  <div class="col">
                    <form action="/nilai_grade/create" method="get">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary" ><i class="fas fa-plus"></i></button>
                  </div>
                </div>
                  <table class="table table-bordered table-hover table-wrapper">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Grade</th>
                        <th>Bobot</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($grades as $nilai)
                      <tr class="text-center">
                        <td>{{ $no }}</td>
                        <td>{{ $nilai->name }}</td>
                        <td>{{ $nilai->bobot }}</td>
                        <td>{{ $nilai->poin}}</td>
                        <td>{{ $nilai->keterangan}}</td>
                        <td>
                          <a href="/nilai_grade/edit{{ $nilai->id }}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                          <a href="/nilai_grade/hapus/{{ $nilai->id }}" type="button" class="btn btn-danger"><i class="nav-icon fas fa-trash-alt"></i></a>
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









  