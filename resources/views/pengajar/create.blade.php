@extends('layouts.master')

@section('title','Teacher')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="green">
            <h4 class="title">Form Tambah Pengajar</h4>
          </div>
            <form class="form-horizontal"  action="/pengajar/save" method="post">
                    {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="name" class="control-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}" >

                      @if ($errors->has('nama'))
                        <span class="help-block">
                          <strong style="color:red;">{{ $errors->first('nama') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                  <label for="alamat" class="control-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" >
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="tempat_lahir" class=" control-label">Tempat Lahir</label>
                      <input type="text" maxlength="13" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" onKeypress="return n(event)">
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                      <input type="text" class="form-control date" id="date" name="tgl_lahir" placeholder="Tanggal Lahir" value="{{ old('tgl_lahir') }}" >
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-6" style="width:42%;">
                <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                  <label for="universitas" class="control-label">Universitas</label>
                    <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Universitas" value="{{ old('universitas') }}" >
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                  <label for="jurusan" class="control-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}" >
                  </div>
                </div>
              </div>

              </div>



              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="no_tlp" class=" control-label">No Telepon/Hp</label>
                      <input type="text" maxlength="13" class="form-control" id="no_tlp" name="no_tlp" placeholder="No Telepon/Hp" value="{{ old('no_tlp') }}" onKeypress="return n(event)">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="sosmed" class="control-label">ID Line/BBM</label>
                      <input type="text" class="form-control" id="sosmed" name="sosmed" placeholder="ID Line/BBM " value="{{ old('sosmed') }}" >
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="pendidikan" class=" control-label">Pendidikan Terakhir</label>
                      <input type="text" maxlength="13" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir" value="{{ old('pendidikan') }}" onKeypress="return n(event)">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="semester" class="control-label">Semester Sekarang di universitas</label>
                      <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester Sekarang di universitas" value="{{ old('semester') }}" >
                    </div>
                  </div>
                </div>

              </div>

                <div class="row">

                  <div class="col-md-6" style="width:42%;">
                    <div class="form-group" >
                      <div class="col-md-12 col-md-offset-1">
                        <label for="pengajar" class=" control-label">Pengajar</label>
                          <select class="form-control"  name="pengajar" id="pengajar">
                            <option selected="selected" disabled="disabled" value="">- Select Pengajar -</option>
                            <option value="M">Matematika</option>
                            <option value="F">Fisika</option>
                            <option value="K">Kimia</option>
                          </select>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="petugas" class="control-label">Petugas yang menginput</label>
                      <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{auth::user()->id}}" readonly>
                      <input type="text" class="form-control" id="" name="" value="{{auth::user()->name}}" readonly>
                      </div>
                    </div>
                  </div>
                </div>



              <div class="form-group" >
                <center>
                  <div class="col-md-11">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </center>
              </div>

            </form>
          </div>

        </div>

      </div>

    </div>
@endsection

@section('js')
<script type="text/javascript">
    $('.date').datepicker({
     format: 'yyyy/mm/dd',
    autoclose: true,
    todayBtn : 'linked',
    todayHighlight : 'true'
    });
</script>
@endsection
