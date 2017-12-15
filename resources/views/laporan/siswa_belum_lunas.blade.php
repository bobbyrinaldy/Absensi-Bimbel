@extends('layouts.master')

@section('content')
	<div class="col-md-12">
                      <div class="col-md-12">
                          <div class="card">
                              <div class="card-header" data-background-color="purple">
                                  <h4 class="title">Daftar siswa yang belum lunas</h4>
                              </div>
                              <div class="card-content table-responsive">
                                  <table class="table text-primary">
                                    <thead>
                                      <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Nama Siswa</th>
                                        <th style="text-align:center">Baru Membayar</th>
                                        <th style="text-align:center">Sisa Pembayaran</th>
                                        <th style="text-align:center">Terakhir Membayar</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                        $i=1;
                                      @endphp

                                      @foreach ($siswa as $item)
                                        <td style="text-align:center">{{$i++}}</td>
                                        <td style="text-align:center">{{$item->registrasi->nama}}</td>
                                        <td style="text-align:center">Rp. {{number_format($item->bayar)}}</td>
                                        <td style="text-align:center">Rp. {{number_format($item->sisa_bayar)}}</td>
                                        <td style="text-align:center">{{$item->updated_at}}</td>
                                      @endforeach

                                    </tbody>
                                  </table>

                              </div>
                          </div>
                      </div>
                  </div>
            </div>
@endsection