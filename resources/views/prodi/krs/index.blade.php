@extends('template.home')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h3>Kartu Rencana Studi</h3>
      </div>
    </div>

    {{-- BEGIN CONTENT --}}
    <div class="content">

      {{-- BEGIN CONTAINER --}}
      <div class="container-fluid">

        <div class="row">

          {{-- begin col 1 --}}
          <div class="col">

            {{-- begin card --}}
            <div class="card">
              <div class="card-header"></div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-12">

                      {{-- BEGIN FORM  --}}
                      <form action="/sksmhs" method="post">
                        {{ csrf_field() }} 
                        <div class="form-group row">
                          <label for="staticEmail" class="col-2 col-form-label">Program Studi</label>
                          <div class="col-3">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Pendidikan teknologi Informasi">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Tahun Akademik<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="tahun_akademik_id" required="required">
                              <option value="">- Pilih Tahun Akademik -</option>
                              @foreach ($academic_year as $data)
                              @if ($data->id==$tahun_akademik)
                              <option selected value="{{$data->id}}">
                                {{$data->academic_year}}
                                </option> 
                              @else
                              <option value="{{$data->id}}">
                                {{$data->academic_year}}
                                </option> 
                              @endif
                             
                              @endforeach 
                          </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-2 col-form-label">Angkatan<span class="required" style="color: #dd4b39;">*</span></label>
                          <div class="col-3">
                            <select class="form-control" name="angkatan" required="required">
                                <option value="">-  Pilih Angkatan -</option>
                               
                                <option value="">
                                   
                                </option>
                              
                            </select>
                         </div>
                         <div class="col">
                           <button type="submit" class="btn btn-success center-block align-bottom ">Refresh</button>
                         </div>
                        </div>
                      </form>
                      {{-- AND FORM --}}
                    
                    </div>
                  </div>
                  
              </div>
            </div>
            {{-- end card --}}

          </div>
          {{-- end col 1--}}
          

        </div>

    
        {{-- BEGIN ROW 2 --}}
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form">
                  <form action="/sksmhs/store" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="tahun_akademik" value="">
                    
                    <div class="row">
                      <h5>Kartu Rencana Studi Mahasiswa 2019</h5>
                    </div>
                  
                    <table class="table table-bordered table-hover table-wrapper">

                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>KRS</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <div class="form-group">
                              <div class="">
                                <button type="button" class="btn btn-secondary">Lihat KRS</button>
                              </div>
                            </div>
                          </td> 
                        </tr>
                      

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

















  