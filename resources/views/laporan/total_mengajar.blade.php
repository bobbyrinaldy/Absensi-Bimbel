@extends('layouts.master')

@section('content')
	<div class="col-md-12">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header" data-background-color="purple">
                                  <h4 class="title">Total Akumulasi Durasi Mengajar Pengajar</h4>
                              </div>
                              <div class="card-content table-responsive">
                                  <table class="table text-primary">
                                    <thead>
                                      <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Nama Pengajar</th>
                                        <th style="text-align:center">Mata Kuliah</th>
                                        <th style="text-align:center">Total Durasi Mengajar (Menit)</th>
                                        <th style="text-align:center">Total Sesi Mengajar</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                        $i=1;
                                        $time = date('h:m:s');
                                      @endphp

                                      @foreach ($p as $item)
                                      	<tr>
                                      		<td style="text-align:center">{{$i++}}</td>
                                      		<td style="text-align:center">{{$item->pengajar->nama}}</td>
                                      		@if ($item->pengajar->pengajar === "M")
                                      		  <td style="text-align:center"><span class="label label-info">Matematika</span></td>
                                      		@elseif ($item->pengajar->pengajar === "F")
                                      		  <td style="text-align:center"><span class="label label-warning">Fisika</span></td>
                                      		@else
                                      		  <td style="text-align:center"><span class="label label-primary">Kimia</span></td>
                                      		@endif

                                      		<td style="text-align:center">{{\App\Model\Absence::where('teacher_id',$item->teacher_id)->sum('durasi')}} Menit</td>
                                          <td style="text-align:center">{{\App\Model\Absence::where('teacher_id',$item->teacher_id)->count()}}X Pertemuan</td>
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