@extends('layouts.signin')

@section('content')
  <div class="login-form">
  			<div class="top-login">
  				<span><img style="margin-left:-3px;margin-top:25px;" src="_login/images/logo_mesc.png" alt=""/></span>
  			</div>
  			<h1>@if ($errors->has('username') || $errors->has('password'))
            <span class="help-block">
                <strong>Username / Password salah. Silahkan cek kembali akun anda</strong>
            </span>
        @endif</h1>

  			<div class="login-top">

          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
  				<div class="login-ic">
  					<i ></i>
  					<input type="text"  name="username" value="{{ old('username') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>

  					<div class="clear"> </div>
  				</div>
  				<div class="login-ic">
  					<i class="icon"></i>
  					<input id="password" name="password" type="password"  value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
        
  					<div class="clear"> </div>
  				</div>

  				<div class="log-bwn">
  					<input type="submit"  value="Login" >
  				</div>
  				</form>
  			</div>
  			<p class="copy">© 2017 MES.C. All rights reserved</p>
  </div>

@endsection
