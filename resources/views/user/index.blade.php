@extends('layouts.master')

@section('title','Data Pengajar')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="blue">
          <h4 class="title">Data User Login Admin</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"><a href="/admin/user/create" class="btn btn-primary">Tambah Admin</a></h3>
      <table id="table" class="table text-primary">
          <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Nama</th>
              <th style="text-align:center">Username</th>
              <th style="text-align:center">Dibuat Tanggal</th>
              <th style="text-align:center">Action</th>
            </tr>
          </thead>

          <tbody>
            @php
              $no=1;
            @endphp

            @foreach ($user as $item)
              <tr>
                <td style="text-align:center">{{$no++}}</td>
                <td style="text-align:center">{{$item->name}}</td>
                <td style="text-align:center">{{$item->username}}</td>
                <td style="text-align:center">{{$item->created_at}}</td>
                <td style="text-align:center">
                  <a href="/admin/user/{{$item->id}}/edit" class="btn btn-warning btn-xs- btn-simple" rel="tooltip" title="Edit"><span class="fa fa-edit"></span></a>
                  <a href="/admin/user/{{$item->id}}/hapus" class="btn btn-danger btn-xs- btn-simple" rel="tooltip" title="Delete"><span class="fa fa-trash"></span></a>
                </td>
              </tr>
            @endforeach

          </tbody>


        </table>
      </div>
    <!-- /.box-body -->
    </div>

@endsection
