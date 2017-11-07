@extends('layouts.master')

@section('title','Dashboard')

@section('content')

  <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats card-hover" style="width:230px;height:150px;">
            <div class="card-header" data-background-color="orange">
              <a href="/pendaftaran"><i class="material-icons material-hover">group_add</i></a>
            </div>
            <div class="card-content">
              <p class="category">Pendaftar Baru Bulan ini</p>
              <h4 class="title">{{ $siswa_baru }} Siswa</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
                <a href="/siswa" target="_blank" class="small-box-footer">Go to siswa <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-6 col-sm-6">
  							<div class="card card-stats" style="width:230px;height:150px;">
  								<div class="card-header" data-background-color="green">
  									<a href="/employee"><i class="material-icons material-hover">attach_money</i></a>
  								</div>
  								<div class="card-content">
  									<p class="category">Siswa Belum Lunas</p>
  									<h4 class="title">{{$tl}} Siswa</h4>
  								</div>
  								<div class="card-footer">
  									<div class="stats">
  										<a href="/administrasi" target="_blank"class="small-box-footer">Go to administrasi <i class="fa fa-arrow-circle-right"></i></a>
  									</div>
  								</div>
  							</div>
  						</div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-6 col-sm-6">
  							<div class="card card-stats" style="width:230px;height:150px;">
  								<div class="card-header" data-background-color="red">
  									<a href="/project"><i class="material-icons material-hover">accessibility</i></a>
  								</div>
  								<div class="card-content">
  									<p class="category">Jumlah Pengajar</p>
  									<h4 class="title">{{$teacher}} Orang</h4>
  								</div>
  								<div class="card-footer">
  									<div class="stats">
  										<a href="/pengajar" target="_blank" class="small-box-footer">Go to pengajar <i class="fa fa-arrow-circle-right"></i></a>
  									</div>
  								</div>
  							</div>
  						</div>


            <!-- ./col -->
            <div class="col-lg-3 col-md-6 col-sm-6">
  							<div class="card card-stats" style="width:230px;height:150px;">
  								<div class="card-header" data-background-color="blue">
  									<a href="/client"><i class="material-icons material-hover">work</i></a>
  								</div>
  								<div class="card-content">
  									<p class="category">Jumlah Kelompok</p>
  									<h4 class="title">{{$kelompok}} Grup</h4>
  								</div>
  								<div class="card-footer">
  									<div class="stats">
  										<a href="/kelompok" target="_blank" class="small-box-footer">Go to kelompok <i class="fa fa-arrow-circle-right"></i></a>
  									</div>
  								</div>
  							</div>
  						</div>


              <div class="row">
              <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" data-background-color="orange">
                                <h4 class="title">Siswa Membayar Cicilan</h4>
                            </div>
                            <div class="card-content table-responsive">
                              <table class="table text-primary">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Kriteria</th>
                                    <th>Sisa Bayar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php
                                    $i=1;
                                  @endphp

                                  @foreach ($siswa_bayar as $item)
                                    <tr>
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $item->nama }}</td>
                                      <td>{{ $item->fakultas }}</td>
                                      @if ($item->kriteria == "P")
                                        <td><span class="label label-info">Private</span></td>
                                      @elseif ($item->kriteria == "D")
                                        <td><span class="label label-primary">Group 2 Orang</span></td>
                                      @else
                                        <td><span class="label label-success">Group 3 Orang</span></td>
                                      @endif
                                      <td>{{ number_format($item->administrasi->sisa_bayar) }}</td>

                                    </tr>
                                  @endforeach

                                </tbody>
                              </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header" data-background-color="purple">
                                  <h4 class="title">Pendaftar Baru</h4>
                              </div>
                              <div class="card-content table-responsive">
                                  <table class="table text-primary">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Fakultas</th>
                                        <th>No Tlp</th>
                                        <th>Kriteria</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                        $i=1;
                                      @endphp

                                      @foreach ($siswa_daftar as $item)
                                        <tr>
                                          <td>{{ $i++ }}</td>
                                          <td>{{ $item->nama }}</td>
                                          <td>{{ $item->fakultas }}</td>
                                          <td>{{ $item->no_tlp }}</td>
                                          @if ($item->kriteria == "P")
                                            <td><span class="label label-info">Private</span></td>
                                          @elseif ($item->kriteria == "D")
                                            <td><span class="label label-primary">Group 2 Orang</span></td>
                                          @else
                                            <td><span class="label label-success">Group 3 Orang</span></td>
                                          @endif
                                        </tr>
                                      @endforeach

                                    </tbody>
                                  </table>

                              </div>
                          </div>
                      </div>
                  </div>
            </div>
@endsection
