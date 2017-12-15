@extends('layouts.master')

@section('title','Administration')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="blue">
          <h4 class="title">Data Pengajar</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"><a href="/pengajar/create" class="btn btn-primary">Tambah Pengajar</a></h3>
      <table id="table" class="table text-primary">
          <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Nama</th>
              <th style="text-align:center">ID Line/BBM</th>
              <th style="text-align:center">No Telp</th>
              <th style="text-align:center">Universitas</th>
              <th style="text-align:center">Jurusan</th>
              <th style="text-align:center">Pengajar</th>
              <th style="text-align:center">Petugas</th>
              <th style="text-align:center">Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $no=1;
            @endphp

            @foreach ($teacher as $item)
              <tr>
                <td style="text-align:center">{{ $no++ }}</td>
                <td style="text-align:center">{{ $item->nama }}</td>
                <td style="text-align:center">{{ $item->sosmed }}</td>
                <td style="text-align:center">{{ $item->no_tlp }}</td>
                <td style="text-align:center">{{ $item->universitas }}</td>
                <td style="text-align:center">{{ $item->jurusan }}</td>
                @if ($item->pengajar == "M")
                  <td style="text-align:center"><span class="label label-info">Matematika</span></td>
                @elseif ($item->pengajar == "F")
                  <td style="text-align:center"><span class="label label-success">Fisika</span></td>
                @else
                  <td style="text-align:center"><span class="label label-primary">Kimia</span></td>
                @endif
                <td style="text-align:center">{{ $item->user->name }}</td>
                <td style="text-align:center">
                  <a href="/pengajar/edit/{{$item->id}}" rel="tooltip" title="Edit" class="btn btn-warning btn-xs btn-simple"><span class="fa fa-edit"></span></a>
                  <a href="/pengajar/hapus/{{$item->id}}"rel="tooltip" title="Delete" class="btn btn-danger btn-xs btn-simple"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
            @endforeach

          </tbody>


        </table>
      </div>
    <!-- /.box-body -->
    </div>

@endsection
