@extends('layouts.master')

@section('title','Administration')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="orange">
          <h4 class="title">Kelompok Siswa</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"><a href="/kelompok/create" class="btn btn-primary">Tambah Kelompok</a></h3>
      <table id="table" class="table text-primary">
          <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Nama Kelompok</th>
              <th style="text-align:center">Kriteria Kelompok</th>
              <th style="text-align:center">Nama Siswa</th>
              <th style="text-align:center">Petugas</th>
              <th style="text-align:center">Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $no=1;
            @endphp
            @foreach ($kelompok as $item)
              @php
                $coba = DB::table('subgroups')->select('nama')->join('Registrations','subgroups.registration_id','Registrations.id')->where('group_id',$item->id)->get();
              @endphp
              <tr>
                <td style="text-align:center">{{$no++}}</td>
                <td style="text-align:center">{{$item->nama_grup}}</td>
                @if ($item->kriteria == "P")
                  <td style="text-align:center"><span class="label label-info">Private</span></td>
                @elseif ($item->kriteria == "D")
                  <td style="text-align:center"><span class="label label-success">Group 2 Orang</span></td>
                @else
                  <td style="text-align:center"><span class="label label-danger">Group 3 Orang</span></td>
                @endif
                <td style="text-align:center">@foreach ($coba as $key)
                  <span class="label label-warning">{{ $key->nama }}</span> <br>
                @endforeach</td>
                <td style="text-align:center">{{ $item->user->name }}</td>
                <td style="text-align:center">
                  <a href="/kelompok/edit/{{$item->id}}" rel="tooltip" title="Edit" class="btn btn-warning btn-xs btn-simple"><span class="fa fa-edit"></span></a>
                  <a href="/kelompok/hapus/{{$item->id}}"rel="tooltip" title="Delete" class="btn btn-danger btn-xs btn-simple"><span class="fa fa-trash"></span></a>
                </td>

              </tr>
            @endforeach
          </tbody>


        </table>
      </div>
    <!-- /.box-body -->
    </div>



@endsection
