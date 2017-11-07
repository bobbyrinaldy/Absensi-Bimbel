@extends('layouts.master')

@section('title','Consult')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="orange">
          <h4 class="title">Data Absen Konsultasi</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"><a href="/absen_konsultasi/create" class="btn btn-success">Input Absen Konsultasi</a></h3>
      <table id="table" class="table text-primary">
          <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Tanggal</th>
              <th style="text-align:center">Pengajar</th>
              <th style="text-align:center">Siswa</th>
              <th style="text-align:center">Tempat</th>
              <th style="text-align:center">Waktu</th>
              <th style="text-align:center">Keterangan</th>
              <th style="text-align:center">Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $no=1;
            @endphp
            @foreach ($konsul as $item)
              @php
              $coba = DB::table('subconsult')->select('nama')->join('Registrations','subconsult.registration_id','Registrations.id')->where('consultation_id',$item->id)->get();
              @endphp
              <tr>
                <td style="text-align:center">{{ $no++ }}</td>
                <td style="text-align:center">{{ $item->tanggal }}</td>
                <td style="text-align:center">{{ $item->pengajar->nama }}</td>
                <td style="text-align:center">@foreach ($coba as $key)
                  <p class="label label-info">{{ $key->nama }}</p> <br>
                @endforeach</td>
                <td style="text-align:center">{{ $item->waktu }}</td>
                <td style="text-align:center">{{ $item->tempat }}</td>
                <td style="text-align:center">{{ $item->keterangan }}</td>
                <td style="text-align:center">
                  <a href="/absen_konsultasi/edit/{{$item->id}}" rel="tooltip" title="Edit" class="btn btn-warning btn-xs btn-simple"><span class="fa fa-edit"></span></a>
                  <a href="/absen_konsultasi/hapus/{{$item->id}}"rel="tooltip" title="Delete" class="btn btn-danger btn-xs btn-simple"><span class="fa fa-trash"></span></a>
                </td>


              </tr>
            @endforeach
          </tbody>


        </table>
      </div>
    <!-- /.box-body -->
    </div>

@endsection
