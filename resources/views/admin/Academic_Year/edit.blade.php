@extends('template.home')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Edit Tahun Akademik</h3>
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
                    @foreach ($academic_years as $tahun_akademik)
                    <form action="/tahun_akademik/update" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $tahun_akademik->id }}">
                        <div class="form-group">
                            <label>Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="number" required="required" name="name" value="{{ $tahun_akademik->name }}">
                        </div>
                        <div class="form-group">
                            <label>Semester<span class="required" style="color: #dd4b39;">*</span></label>
                            <select class="form-control" name="semester">
                                <option value="">- Pilih Semester -</option>
                                <option value="Ganjil" <?php echo "Ganjil" == $tahun_akademik->semester ? 'selected' : ' ';  ?>>Ganjil</option>
                                <option value="Genap" <?php echo "Genap" == $tahun_akademik->semester ? 'selected' : ' ';  ?>>Genap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mulai Input Nilai Mahasiswa<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="start_time_value" value="{{ $tahun_akademik->start_time_value }}">
                        </div>
                        <div class="form-group">
                            <label>Akhir Input Nilai Mahasiswa<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="end_of_time_value" value="{{ $tahun_akademik->end_of_time_value }}">
                        </div>
                        <div class="form-group">
                            <label>Mulai Penawaran<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="start_time_bidding" value="{{ $tahun_akademik->start_time_bidding }}">
                        </div>
                        <div class="form-group">
                            <label>Akhir Penawaran<span class="required" style="color: #dd4b39;">*</span></label>
                            <input class="form-control" type="datetime-local" required="required" name="end_of_time_bidding" value="{{ $tahun_akademik->end_of_time_bidding }}">
                        </div>
                    <input class="btn btn-secondary" type="submit" value="Simpan Data">
                    <a href="/tahun_akademik" class="btn btn-danger">Kembali</a>
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




































