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
                <form action="/nilai/create" method="get">
                  {{ csrf_field() }}
          
                  <div class="row">
                    <div class="col">
                      <input class="btn btn-primary mb-3" type="submit" value="Tambah Data">
                    </div>
                  </div>
                  <table class="table table-bordered table-hover table-wrapper">
                    <thead>
                      <tr>
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
                      <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $nilai->name }}</td>
                        <td>{{ $nilai->bobot }}</td>
                        <td>{{ $nilai->poin}}</td>
                        <td>{{ $nilai->keterangan}}</td>
                        <td>
                          <a href="/nilai/edit{{ $nilai->id }}" type="button" class="btn btn-warning">Edit</a>
                          <a href="/nilai/hapus/{{ $nilai->id }}" type="button" class="btn btn-danger">Hapus</a>
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









  