@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Grade Nilai</h3>
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
                    @foreach ($grades as $grade)
                    <form action="/nilai/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $grade->id }}">
                        <div class="form-group">
                            <label>Grade<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" required="required" name="name" value="{{ $grade->name }}">
                        </div>
                        <div class="form-group">
                          <label>Bobot<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="number" required="required" name="bobot" value="{{ $grade->bobot }}">
                        </div>
                        <div class="form-group">
                          <label>Poin<span class="required" style="color: #dd4b39;">*</span></label>
                          <input class="form-control" type="text" required="required" name="poin" value="{{ $grade->poin }}">
                        </div>
                        <div class="form-group">
                          <label>Keterangan<span class="required" style="color: #dd4b39;">*</span></label>
                          <select class="form-control" name="keterangan">
                              <option value="">- Pilih Keterangan -</option>
                              <option value="LULUS" <?php echo "LULUS" == $grade->keterangan ? 'selected' : ' ';  ?>>LULUS</option>
                              <option value="TIDAK LULUS" <?php echo "TIDAK LULUS" == $grade->keterangan ? 'selected' : ' ';  ?>>TIDAK LULUS</option>
                          </select>
                      </div>
                        <input class="btn btn-secondary" type="submit" value="Simpan Data">
                        <a href="/nilai" class="btn btn-danger">Kembali</a>
                      </form>
                      @endforeach
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
      
      
      
      
      
      































