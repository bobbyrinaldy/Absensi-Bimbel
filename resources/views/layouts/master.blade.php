<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('_login/images/logo_mesc.png')}}" />
	<link rel="icon" type="image/png" href="{{asset('_login/images/logo_mesc.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('plugins/datatables/css/dataTables.uikit.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/select2/select2.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/jdatepicker/css/bootstrap-datepicker.css') }}">

    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    {{-- <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" /> --}}

    <!--     Fonts and icons     -->
    <link href="{{asset('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='{{asset('http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons')}}' rel='stylesheet' type='text/css'>
</head>

<body>

	<div class="modal fade" id="bayar" role="dialog" tabindex='-1'>
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Form Pembayaran Cicilan</h4>
	      </div>
	      <div class="modal-body">
					<form class="form-horizontal" action="/bayar" method="post">
						{{ csrf_field() }}
						<div class="col-md-5">
							<div class="form-group">
								<label for="total" class="control-label">Kriteria</label><br>
									<div id="total" class="label label-info">
									</div>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label for="total_bayar" class="control-label">Total Pembayaran</label>
									<input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
							</div>
						</div>

						<input type="hidden" name="cicilan" id="cicilan">
						<input type="hidden" name="id" id="id">

						<div class="col-md-5" id="ga_bisa_bayar">
							<div class="form-group">
								<label for="total_bayar" class="control-label">Akan Membayar</label>
									<input type="text" class="form-control" name="akan_bayar" id="akan_bayar" onchange="bayar()" required>
							</div>
						</div>

	      </div>
	      <div class="modal-footer">
					<div class="col-md-12">
						<div class="form-group">
							<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							<button type="submit" name="submit" class="btn btn-primary">Bayar</button>
							<input type="hidden" name="_method" value="put">
						</div>
					</div>
	      </div>
	    </div>

		</form>
	  </div>
</div>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="{{asset('_login/images/logo_mesc.png')}}">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="/" class="simple-text">
					<img src="{{asset('_login/images/logo_mesc.png')}}" width="150px" alt="">
				</a>
			</div>

			@if (auth::user()->status == 'admin')
				<div class="sidebar-wrapper">
	            <ul class="nav">
								<li class="{{ Request::is('/') ? 'active' : ''}}">
									<a href="/">
											<i class="material-icons">dashboard</i>
											<p>Dashboard</p>
									</a>
								</li>
								<li class="{{ Request::is('pendaftaran', 'pendaftaran/*') ? 'active' : ''}}">
                    <a href="/pendaftaran">
                        <i class="material-icons">face</i>
                        <p>Pendaftaran Baru</p>
                    </a>
                </li>

								{{-- <li class="{{ Request::is('administrasi', 'administrasi/*') ? 'active' : ''}}">
                    <a href="/administrasi">
                        <i class="material-icons">attach_money</i>
                        <p>Administrasi</p>
                    </a>
                </li> --}}
								<li class="{{ Request::is('pengajar', 'pengajar/*') ? 'active' : ''}}">
                    <a href="/pengajar">
                        <i class="material-icons">accessibility</i>
                        <p>Pengajar</p>
                    </a>
                </li>

								<li class="{{ Request::is('siswa', 'siswa/*') ? 'active' : ''}}">
                    <a href="/siswa">
                        <i class="material-icons">accessibility</i>
                        <p>Siswa</p>
                    </a>
                </li>

								<li class="{{ Request::is('kelompok', 'kelompok/*') ? 'active' : ''}}">
                    <a href="/kelompok">
                        <i class="material-icons">group_add</i>
                        <p>Kelompok</p>
                    </a>
                </li>



								<li class="{{ Request::is('absen_kelas', 'absen_kelas/*') ? 'active' : ''}}">
                    <a href="/absen_kelas">
                        <i class="material-icons">assignment</i>
                        <p>Absen Mengajar</p>
                    </a>
                </li>

								<li class="{{ Request::is('absen_konsultasi', 'absen_konsultasi/*') ? 'active' : ''}}">
                    <a href="/absen_konsultasi">
                        <i class="material-icons">assignment_turned_in</i>
                        <p>Absen Konsultasi</p>
                    </a>
                </li>

	            </ul>
	    	</div>

	    	@else
<div class="sidebar-wrapper">
	            <ul class="nav">
					<li class="{{ Request::is('/') ? 'active' : ''}}">
						<a href="/">
							<i class="material-icons">dashboard</i>
								<p>Dashboard</p>
						</a>
					</li>

				<li class="{{ Request::is('absen_kelas', 'absen_kelas/*') ? 'active' : ''}}">
                    <a href="/absen_kelas">
                        <i class="material-icons">assignment</i>
                        <p>Absen Mengajar</p>
                    </a>
                </li>

				<li class="{{ Request::is('absen_konsultasi', 'absen_konsultasi/*') ? 'active' : ''}}">
                    <a href="/absen_konsultasi">
                        <i class="material-icons">assignment_turned_in</i>
                        <p>Absen Konsultasi</p>
                    </a>
                </li>

	            </ul>
	    	</div>
			@endif
	    	


	    </div>

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							@if (auth::user()->status == 'admin')
								<li>
									<a href="/admin/user" class="dropdown-toggle">
		 							   <i class="material-icons">verified_user</i>
		 							   <p class="hidden-lg hidden-md"></p>
										 Tambah Admin
			 						</a>
								</li>
							@endif
							

							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">book</i>
	 							   <p class="hidden-lg hidden-md"></p>
									 Laporan
		 						</a>
               					 <ul class="dropdown-menu">
									<li><a href="/laporan/statistik_matkul">
                      						Laporan Statistik Mata Kuliah
                  						</a>
					              	</li>

					              	<li><a href="/laporan/total_mengajar">
                      						Laporan Total Mengajar
                  						</a>
					              	</li>

					              	<li><a href="/laporan/total_konsultasi">
                      						Laporan Jumlah Konsultasi Siswa
                  						</a>
					              	</li>

					              	<li><a href="/laporan/siswa_belum_lunas">
                      						Laporan Siswa Belum Lunas
                  						</a>
					              	</li>
								</ul>
							</li>

              				<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md"></p>
									 {{ Auth::user()->name }}
		 						</a>
               					 <ul class="dropdown-menu">
               					 	<li><a href="/change_password">Change Password</a></li>
									<li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      						Logout
                  						</a>
					                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;" >
					                      {{ csrf_field() }}
					                  </form>
					              	</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>


		</div>
	</div>


</body>

	<!--   Core JS Files   -->
	<script src="{{asset('assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('plugins/datatables/js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('plugins/jdatepicker/js/bootstrap-datepicker.js') }}"></script>
	{{-- <script src="{{ asset('assets/js/bootstrap-modal.js')}}"></script> --}}
	<script src="{{ asset('plugins/select2/select2.js') }}"></script>

	<!--  Charts Plugin -->
	<script src="{{asset('assets/js/chartist.min.js')}}"></script>

	<!--  Notifications Plugin    -->
	<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

	<!--  Google Maps Plugin    -->
	{{-- <script type="text/javascript" src="{{asset('https://maps.googleapis.com/maps/api/js')}}"></script> --}}

	<!-- Material Dashboard javascript methods -->
	<script src="{{asset('assets/js/material-dashboard.js')}}"></script>
	<script src="{{asset('plugins/chart/code/highcharts.js')}}"></script>
	<script src="{{asset('plugins/chart/code/modules/exporting.js')}}"></script>

	@yield('js')

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	{{-- <script src="{{asset('assets/js/demo.js')}}"></script> --}}
	<script type="text/javascript">
		function bayar(){
			var total = parseInt(document.getElementById('total_bayar').value);
			var setengah = total/2;

			var akan_bayar = parseInt(document.getElementById('akan_bayar').value);
			var cicilan = parseInt(document.getElementById('cicilan').value);

			if (akan_bayar > total) {
				alert('Pembayaran tidak boleh melebihi total pembayaran seharusnya !')
				document.getElementById('akan_bayar').value = "";
				document.getElementById('akan_bayar').focus();

			}else if(akan_bayar<setengah){
				alert('Pembayaran pertama minimal setengahnya atau sebesar Rp. '+setengah);
				document.getElementById('akan_bayar').value = "";
				document.getElementById('akan_bayar').focus();
			}else if (cicilan > 0 && akan_bayar < total) {
				alert('Pembayaran yang ke 2 ,dan harus langsung dilunasi sebesar Rp. '+total);
				document.getElementById('akan_bayar').value = "";
				document.getElementById('akan_bayar').focus();
			}

		}

		$('#bayar').on('shown.bs.modal', function() {
			document.getElementById('akan_bayar').focus();
    	var cicilan = document.getElementById('cicilan').value;
			if (cicilan >=2) {
				$('#ga_bisa_bayar').hide();
			}
		})
	</script>

	<script type="text/javascript">

  $(document).ready(function(){
    $('#table').DataTable({
      aaSorting :[],
      stateSave : true,
    });
  });
  </script>



</html>
