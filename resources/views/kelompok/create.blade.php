@extends('layouts.master')

@section('title','Group')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Form Tambah Kelompok</h4>
          </div>
            <form class="form-horizontal"  action="/kelompok/save" method="post">
                    {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="name" class="control-label">Nama Kelompok</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kelompok" value="{{ old('nama') }}" required>

                      @if ($errors->has('nama'))
                        <span class="help-block">
                          <strong style="color:red;">{{ $errors->first('nama') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="kriteria" class=" control-label">Kriteria</label>
                        <select class="form-control"  name="kriteria" id="kriteria" required>
                          <option selected="selected" disabled="disabled" value="">- Select Kriteria -</option>
                          <option value="P">Private</option>
                          <option value="D">Grup 2 Orang</option>
                          <option value="T">Grup 3 Orang</option>
                        </select>

                      </div>
                  </div>
                </div>

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="pertama" class=" control-label">Nama Siswa</label><br>
                        <select class="form-control select2" name="siswa[]" id="siswa" multiple="multiple" data-placeholder="Pilih Siswa" required>

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

  $(document).ready(function(){
    $(".select2").select2({
      allowClear: true
    });


    $('#kriteria').on('change', function() {
        var kriteria = this.value;
        $('#siswa option').remove();

        if (kriteria == "P") {
          $.ajax({
            url: "{{url('/check')}}",
            method: "get",
            data: {kriteria:kriteria},
            contentType: "application/json",
            success: function(data){
                $.each(data, function(index,val){
                  $("#siswa").append($('<option>', {value:''+val.id+'', text: ''+val.nama+''}));
                })
            }
          })

          $(".select2").select2({
            allowClear: true,
            maximumSelectionLength: 1
          });
          console.log("1");
        }else if (kriteria == "D") {
          $.ajax({
            url: "{{url('/check')}}",
            method: "get",
            data: {kriteria:kriteria},
            contentType: "application/json",
            success: function(data){
                $.each(data, function(index,val){
                  $("#siswa").append($('<option>', {value:''+val.id+'', text: ''+val.nama+''}));
                })
            }
          })
          $(".select2").select2({
            allowClear: true,
            maximumSelectionLength: 2
          });
          console.log("2");

        }else if (kriteria == "T") {
          $.ajax({
            url: "{{url('/check')}}",
            method: "get",
            data: {kriteria:kriteria},
            contentType: "application/json",
            success: function(data){
                $.each(data, function(index,val){
                  $("#siswa").append($('<option>', {value:''+val.id+'', text: ''+val.nama+''}));
                })
            }
          })

          $(".select2").select2({
            allowClear: true,
            maximumSelectionLength: 3
          });
          console.log("3");

        }
    });


  });
  </script>
@endsection
