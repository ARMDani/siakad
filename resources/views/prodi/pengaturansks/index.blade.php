@extends('template.home')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="container">
            <div class="card-body">
              <h3>Pengaturan SKS Mahasiswa</h3>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <span class="border">
                  <div class="container">
                        <div class="container bg-info text-white">
                          <h1>Contoh Container</h1>
                        </div>
                        <div class="col">
                          <a href="/sksmhs">
                            <button href="" type="button" class="btn btn-success">Refresh</button>
                          </a>
                        </div>
                  </div>
                </span>
              </div>
              <div class="container-fuild">
                <table class="table table-bordered table-hover table-wrapper">
                    <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Fakultas</th>
                      <th>Opsi</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-secondary"> Edit </a>
                            <a href=""class="btn btn-danger"> Hapus </a>
                        </td>
                    </tr>
                </table>
                <br/>
                <br/>
                <br/>
                <br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

















  