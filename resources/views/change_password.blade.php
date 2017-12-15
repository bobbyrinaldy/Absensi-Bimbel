@extends('layouts.master')

@section('title','Change Password')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Form Input Absen Konsultasi</h4>
          </div>
          <br>
          <center>
            @if (\Session::get('success'))
            <pre>{{\Session::get('success')}}</pre>
            @elseif (\Session::get('fail'))
            <pre>{{\Session::get('fail')}}</pre>
            @endif
          </center>

            <form class="form-horizontal"  action="/change_password/save/{{Auth::user()->id}}" method="post">
                    {{ csrf_field() }}

              <div class="col-md-offset-3">
                <div class="form-group">
                  <b> Password Lama</b>
                  <input type="password" name="old_password" class="form-control" style="width: 50%">
                </div>

                @if ($errors->has('old_password'))
                      <span class="help-block">
                          <strong style="color: red">*Password harus sama dengan saat ini!</strong>
                      </span>
                  @endif

                <div class="form-group">
                  <b> Password Baru</b>
                  <input type="password" name="password" class="form-control" style="width: 50%">
                </div>

                <div class="form-group">
                  <b> Konfirmasi Password Baru</b>
                  <input type="password" name="password_confirmation" class="form-control" style="width: 50%">
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
