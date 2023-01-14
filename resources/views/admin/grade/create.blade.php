@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Tambah Grade Nilai</h3>
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
                  <form action="/nilai_grade/store" method="post">
                    {{ csrf_field() }}
      
                        <div class="form-group">
                            <label>Grade<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="text" name="name" placeholder="Masukan Grade ..." required="required">
                        </div>
                        <div class="form-group ">
                        <div class="form-group">
                          <label>Bobot<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="number" name="bobot" placeholder="Masukan Bobot ..." required="required">
                        </div>
                        <div class="form-group">
                          <label>Poin<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" name="poin" placeholder="Masukan Poin ..."  required="required">
                        </div>
                        <label>Keterangan<span class="required" style="color: #dd4b39;">*</span></label>
                              <select class="form-control" name="keterangan" name="group_id" placeholder="Masukan Keterangan ..." required="required">
                                  <option value="">- Pilih Keterangan -</option>
                                  <option value="LULUS" >LULUS</option>
                                  <option value="TIDAK LULUS" >TIDAK LULUS</option>
                              </select>
                        </div>
                          <input class="btn btn-secondary" type="submit" value="Simpan Data">
                          <a href="/nilai_grade" class="btn btn-danger">Kembali</a>
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