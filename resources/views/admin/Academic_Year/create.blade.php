@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Tahun Akademik</h3>
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
                  <form action="/tahun_akademik/store" method="get">
                    {{ csrf_field() }}
      
                        <div class="form-group">
                            <label>Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" name="tahun_akademik" placeholder="Masukan Tahun Akademik ..." type="number" name="tahun_akademik" required="required">
                        </div>
                        <div class="form-group ">
                          <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                              <select class="form-control" name="semester" name="group_id" required="required">
                                  <option value="">- Pilih Semester -</option>
                                  <option value="1" >Ganjil</option>
                                  <option value="0" >Genap</option>
                              </select>
                        </div>
                          <input class="btn btn-secondary" type="submit" value="Simpan Data">
                          <a href="/tahun_akademik" class="btn btn-danger">Kembali</a>
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