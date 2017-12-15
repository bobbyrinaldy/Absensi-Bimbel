@extends('layouts.master')

@section('title','Form User')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="purple">
            <h4 class="title">Form Tambah User</h4>
          </div>
          <br>

            <form class="form-horizontal"  action="/admin/user/save" method="post">
                    {{ csrf_field() }}

              <div class="col-md-offset-3">

                <div class="form-group">
                  <b> Nama Lengkap</b>
                  <input type="text" name="nama" class="form-control" style="width: 50%">
                </div>

                @if ($errors->has('nama'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('nama') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                  <b> Username</b>
                  <input type="text" name="username" class="form-control" style="width: 50%">
                </div>

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('username') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                  <b> Password</b>
                  <input type="password" name="password" class="form-control" style="width: 50%">
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <div class="form-group">
                  <b> Konfirmasi Password</b>
                  <input type="password" name="password_confirmation" class="form-control" style="width: 50%">
                </div>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong style="color: red">{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif

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
