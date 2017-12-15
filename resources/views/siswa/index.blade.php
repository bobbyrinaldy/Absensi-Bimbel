@extends('layouts.master')

@section('title','Administration')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="blue">
          <h4 class="title">Data Siswa</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"><a href="/pengajar/create" class="btn btn-primary">Tambah Siswa</a></h3>
      <table id="table" class="table text-primary">
          <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Nama</th>
              <th style="text-align:center">Alamat</th>
              <th style="text-align:center">ID Line/BBM</th>
              <th style="text-align:center">No Telp</th>
              <th style="text-align:center">No Telp Ortu</th>
              <th style="text-align:center">Fakultas</th>
              <th style="text-align:center">Asal Sekolah</th>
              <th style="text-align:center">Group</th>
              <th style="text-align:center">Petugas</th>
              <th style="text-align:center">Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $no=1;
            @endphp

            @foreach ($siswa as $item)
              <tr>
                <td style="text-align:center">{{ $no++ }}</td>
                <td style="text-align:center">{{ $item->nama }}</td>
                <td style="text-align:center">{{ $item->alamat }}</td>
                <td style="text-align:center">{{ $item->sosmed }}</td>
                <td style="text-align:center"><small>{{ $item->no_tlp }}</small></td>
                <td style="text-align:center"><small>{{ $item->no_tlp_ortu }}</small></td>
                <td style="text-align:center">{{ $item->fakultas }}</td>
                <td style="text-align:center">{{ $item->asal_sekolah }}</td>
                @if ($item->kriteria == "P")
                  <td style="text-align:center"><span class="label label-info">Private</span></td>
                @elseif ($item->kriteria == "D")
                  <td style="text-align:center"><span class="label label-warning">Group 2 Orang</span></td>
                @else
                  <td style="text-align:center"><span class="label label-danger">Group 3 Orang</span></td>

                @endif
                <td style="text-align:center">{{ $item->user->name }}</td>
                <td style="text-align:center">
                  <a href="/siswa/edit/{{$item->id}}" rel="tooltip" title="Edit" class="btn btn-warning btn-xs btn-simple"><span class="fa fa-edit"></span></a>
                  <a href="/siswa/hapus/{{$item->id}}"rel="tooltip" title="Delete" class="btn btn-danger btn-xs btn-simple"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
            @endforeach

          </tbody>


        </table>
      </div>
    <!-- /.box-body -->
    </div>

@endsection
