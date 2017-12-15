@extends('layouts.master')

@section('title','Absence')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="blue">
          <h4 class="title">Data Absen Kelas</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"><a href="/absen_kelas/create" class="btn btn-primary">Input Absen Hari Ini</a></h3>
      <table id="table" class="table text-primary">
          <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Tanggal</th>
              <th style="text-align:center">Kelompok</th>
              <th style="text-align:center">Pengajar</th>
              <th style="text-align:center">Mata Kuliah</th>
              <th style="text-align:center">Tempat</th>
              <th style="text-align:center">Keterangan</th>
              <th style="text-align:center">Waktu Masuk</th>
              <th style="text-align:center">Waktu Selesai</th>
              <th style="text-align:center">Durasi</th>
              <th style="text-align:center">Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $no=1;
            @endphp
            @foreach ($absen as $item)
              <tr>
                <td style="text-align:center">{{ $no++ }}</td>
                <td style="text-align:center">{{ $item->tanggal }}</td>
                <td style="text-align:center">{{ $item->kelompok->nama_grup }}</td>
                <td style="text-align:center">{{ $item->pengajar->nama }}</td>
                @if ($item->matkul === "M")
                  <td style="text-align:center"><span class="label label-info">Matematika</span></td>
                @elseif ($item->matkul === "F")
                  <td style="text-align:center"><span class="label label-warning">Fisika</span></td>
                @else
                  <td style="text-align:center"><span class="label label-primary">Kimia</span></td>
                @endif
                <td style="text-align:center">{{ $item->tempat }}</td>
                <td style="text-align:center">{{ $item->keterangan }}</td>
                <td style="text-align:center">{{ $item->waktu }}</td>
                @if (empty($item->selesai))
                <td style="text-align:center"><a href="/absen_kelas/selesai/{{$item->id}}" class="btn btn-danger btn-xs">Selesai</a> </td>
                <td style="text-align:center"><span class="label label-danger">Belum Selesai</span></td>

                @else
                <td style="text-align:center">{{ $item->selesai }}</td>
                  @php
                    $mk = strtotime($item->waktu);
                    $mk2 = strtotime($item->selesai);
                    $diff = $mk2-$mk;
                    $hours = floor($diff / 60);

                    // // Convert Ke Date Time
                    // $d_mk = new DateTime($mk);
                    // $today = new DateTime($mk2);

                    // $diff = $today->diff($d_mk);
                    // // dd($d_mk,$todayHighlight);
                    // $lama_mengajar = $diff->h ." Jam ".$diff->i." Menit";
                  @endphp
                <td style="text-align:center">{{$hours}} Menit</td>
                @endif
                <td style="text-align:center">
                  <a href="/absen_kelas/edit/{{$item->id}}" rel="tooltip" title="Edit" class="btn btn-warning btn-xs btn-simple"><span class="fa fa-edit"></span></a>
                  <a href="/absen_kelas/hapus/{{$item->id}}"rel="tooltip" title="Delete" class="btn btn-danger btn-xs btn-simple"><span class="fa fa-trash"></span></a>
                </td>


              </tr>
            @endforeach
          </tbody>


        </table>
      </div>
    <!-- /.box-body -->
    </div>

@endsection
