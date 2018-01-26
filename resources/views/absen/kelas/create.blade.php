@extends('layouts.master')

@section('title','Teacher')

@section('content')

@php
  $u = auth::user()->status;
@endphp

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Form Input Absen Kelas</h4>
          </div>
            <form class="form-horizontal"  action="/absen_kelas/save" method="post">
                    {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="tanggal" class="control-label">Tanggal Absen</label>
                      <input type="text" class="form-control date" id="date" name="tanggal" placeholder="Tanggal Absen" value="{{ old('tanggal') }}" required="yes">
                    </div>
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group" >
                  <div class="col-md-12 col-md-offset-1">
                    <label for="pengajar" class=" control-label">Nama Kelompok</label>
                      <select class="form-control"  name="kelompok" id="kelompok">
                        <option selected="selected" disabled="disabled" value="">- Select Kelompok -</option>

                        <optgroup label="Private">
                          @foreach ($P as $item)
                            <option value="{{$item->id}}">{{$item->nama_grup}}</option>
                          @endforeach
                        </optgroup>

                        <optgroup label="Grup 2 Orang">
                          @foreach ($D as $item)
                            <option value="{{$item->id}}">{{$item->nama_grup}}</option>
                          @endforeach
                        </optgroup>

                        <optgroup label="Grup 3 Orang">
                          @foreach ($T as $item)
                            <option value="{{$item->id}}">{{$item->nama_grup}}</option>
                          @endforeach
                        </optgroup>

                      </select>
                    </div>
                </div>
              </div>


              @if (Auth::user()->status == 'admin')

              <div class="row" id="admin">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="pengajar" class=" control-label">Mata Kuliah</label>
                        <select class="form-control"  name="matkul" id="matkul">
                          <option selected="selected" disabled="disabled" value="">- Select Mata kuliah -</option>
                          <option value="M">Matematika</option>
                          <option value="F">Fisika</option>
                          <option value="K">Kimia</option>
                        </select>
                      </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="pengajar" class=" control-label">Pengajar/Tutor</label>
                        <select class="form-control"  name="pengajar" id="pengajar">
                          <option selected="selected" disabled="disabled" value="">- Select Kelompok -</option>
                        </select>
                      </div>
                  </div>
                </div>

              </div>

              @else

              <div class="row">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="matkul" class="control-label">Matakuliah</label>
                      @if ($teacher->pengajar == "M")
                        <input type="text" class="form-control" name="" placeholder="" value="Matematika" readonly="yes">
                        <input type="hidden" class="form-control" name="matkul" placeholder="matkul" value="M" readonly="yes">
                      @elseif ($teacher->pengajar == "F")                     
                        <input type="text" class="form-control" name="" placeholder="" value="Fisika" readonly="yes">
                        <input type="hidden" class="form-control" name="matkul" placeholder="matkul" value="F" readonly="yes">
                      @elseif ($teacher->pengajar == "K")
                        <input type="text" class="form-control" name="" placeholder="" value="Kimia" readonly="yes">
                        <input type="hidden" class="form-control" name="matkul" placeholder="matkul" value="K" readonly="yes">
                      @endif
                    </div>
                  </div>
                </div>

                <div class="col-md-6" >
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="pengajar" class="control-label">Pengajar/Tutor</label>
                      <input type="text" class="form-control" name="" id="" placeholder="Pengajar" value="{{auth::user()->name}}" readonly >
                      <input type="hidden" class="form-control" name="pengajar" id="pengajar" placeholder="Waktu" value="{{auth::user()->teacher_id}}" readonly >
                    </div>
                  </div>
                </div>
              </div>

              @endif

              {{-- <div class="row" id="user">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="matkul" class="control-label">Mata Kuliah</label>
                      <input type="text" class="form-control" name="matkul" placeholder="matkul" value="{{auth::user()->id}}" >
                    </div>
                  </div>
                </div>



                <div class="col-md-6" >
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="pengajar" class="control-label">Pengajar/Tutor</label>
                      <input type="text" class="form-control" name="pengajar" id="pengajar" placeholder="pengajar" value="@php echo Date('h:m:s'); @endphp"  readonly >
                    </div>
                  </div>
                </div>

              </div> --}}



                <div class="row">

                  <div class="col-md-6" style="width:42%;">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="tempat" class="control-label">Tempat</label>
                        <input type="text" class="form-control" name="tempat" placeholder="Tempat" value="{{ old('tempat') }}" >
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6" >
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="waktu" class="control-label">Waktu</label>
                        <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="@php echo Date('H:m:s'); @endphp"  readonly >
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6" style="width:42%;">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="keterangan" class="control-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}" >
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      @if (auth::user()->status == 'admin')
                      <label for="petugas" class="control-label">Petugas yang menginput</label>
                      <input type="text" class="form-control" id="" name="" value="{{auth::user()->name}}" readonly>
                      @endif
                      <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{auth::user()->id}}" readonly>
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
    todayHighlight : 'true',
    startDate : '0'
    });
</script>

<script type="text/javascript">

$(document).ready(function(){
  var u = '<?php echo $u; ?>';
  if (u != 'admin') {
    console.log('bukan admin');
  } else {
    console.log('admin');
  }

  $('#matkul').on('change', function() {
      var matkul = this.value;
      $('#pengajar option').remove();

      if (matkul == "M") {
        $.ajax({
          url: "{{url('/absen_kelas/search')}}",
          method: "get",
          data: {matkul:matkul},
          contentType: "application/json",
          success: function(data){
            console.log(data);
              $.each(data, function(index,val){
                $("#pengajar").append($('<option>', {value:''+val.id+'', text: ''+val.nama+''}));
              })
          }
        })

      }else if (matkul == "F") {
        $.ajax({
          url: "{{url('/absen_kelas/search')}}",
          method: "get",
          data: {matkul:matkul},
          contentType: "application/json",
          success: function(data){
              $.each(data, function(index,val){
                $("#pengajar").append($('<option>', {value:''+val.id+'', text: ''+val.nama+''}));
              })
          }
        })


      }else if (matkul == "K") {
        $.ajax({
          url: "{{url('/absen_kelas/search')}}",
          method: "get",
          data: {matkul:matkul},
          contentType: "application/json",
          success: function(data){
              $.each(data, function(index,val){
                $("#pengajar").append($('<option>', {value:''+val.id+'', text: ''+val.nama+''}));
              })
          }
        })

      }
  });


});
</script>

@endsection
