@extends('layouts.master')

@section('title','Consult')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Form Edit Absen Konsultasi</h4>
          </div>
            <form class="form-horizontal"  action="/absen_konsultasi/update/{{$con->id}}" method="post">
                    {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="tanggal" class="control-label">Tanggal konsultasi</label>
                      <input type="text" class="form-control date" id="date" name="tanggal" placeholder="Tanggal Absen" value="{{$con->tanggal}}" required>
                    </div>
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group" >
                  <div class="col-md-12 col-md-offset-1">
                    <label for="pengajar" class=" control-label">Nama Siswa</label>
                      <select class="form-control select2" multiple  name="siswa[]" id="siswa">
                        @foreach ($siswa as $item)
                          <option value="{{$item->id}}"
                          @if (in_array($item->id , $subcon))
                              {{"selected"}}
                          @endif>
                          {{$item->nama}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                </div>
              </div>
              </div>



              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="pengajar" class=" control-label">Pengajar/Tutor</label>
                        <select class="form-control"  name="pengajar" id="pengajar">
                          <option selected="selected" disabled="disabled" value="">- Select Pengajar -</option>
                          @foreach ($pengajar as $item)
                            <option value="{{$item->id}}" {{ $item->id == $con->teacher_id ? "selected":"" }} >{{$item->nama}}</option>
                        @endforeach
                        </select>
                      </div>
                  </div>
                </div>

                <div class="col-md-6" >
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="tempat" class="control-label">Tempat</label>
                      <input type="text" class="form-control" name="tempat" placeholder="Tempat" value="{{$con->tempat }}" >
                    </div>
                  </div>
                </div>

              </div>

                <div class="row">

                  <div class="col-md-6" style="width:42%;">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="keterangan" class="control-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="{{ $con->keterangan }}" >
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="waktu" class="control-label">Waktu</label>
                        <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu"  readonly >
                      </div>
                    </div>
                  </div>

                </div>



              <div class="form-group" >
                <center>
                  <div class="col-md-11">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <input type="hidden" name="_method" value="put">
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

<script type="text/javascript">

$(document).ready(function(){

  $(".select2").select2({
    allowClear: true,
  });

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

<script type="text/javascript">
        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

        function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

        if(nhour==0){ap=" AM";nhour=12;}
        else if(nhour<12){ap=" AM";}
        else if(nhour==12){ap=" PM";}
        else if(nhour>12){ap=" PM";nhour-=12;}

        if(nmin<=9) nmin="0"+nmin;
        if(nsec<=9) nsec="0"+nsec;

        document.getElementById('waktu').value=""+nhour+":"+nmin+":"+nsec+ap+"";
        }

        window.onload=function(){
        GetClock();
        setInterval(GetClock,1000);
        }
  </script>
@endsection
