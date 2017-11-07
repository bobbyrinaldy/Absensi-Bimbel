@extends('layouts.master')

@section('title','Administration')

@section('content')

  <div class="card">
      <div class="card-header" data-background-color="green">
          <h4 class="title">Administrasi Siswa</h4>
      </div>
      <div class="card-content table-responsive">
         <h3 class="box-title"></h3>
      <table id="table" class="table text-primary">
          <thead>
          <tr>
            <th style="text-align:center">No</th>
            <th style="text-align:center">Nama Lengkap</th>
            <th style="text-align:center">Fakultas</th>
            <th style="text-align:center">No Tlp</th>
            <th style="text-align:center">Daftar Pada</th>
            <th style="text-align:center">Status Pembayaran</th>
            <th style="text-align:center">Kriteria</th>
            <th style="text-align:center">Telah Membayar</th>
            <th style="text-align:center">Sisa Pembayaran</th>
            <th style="text-align:center">Action</th>
          </tr>
          </thead>
          <tbody>
            @php
              $no=1;
            @endphp
            @foreach ($r as $item)
              <tr>
                <td style="text-align:center">{{ $no++ }}</td>
                <td style="text-align:center">{{ $item->nama }}</td>
                <td style="text-align:center">{{ $item->fakultas }}</td>
                <td style="text-align:center">{{ $item->no_tlp }}</td>
                <td style="text-align:center"><small>{{ date('d-m-Y',strtotime($item->created_at)) }}</small></td>
                @if ($item->kriteria === "P" && $item->administrasi->bayar === 3850000 )
                  <td style="text-align:center">
                    <center>
                      <span class="label label-success">LUNAS</span>
                    </center>
                  </td>
                @elseif ($item->kriteria === "D" && $item->administrasi->bayar === 2875000 )
                  <td style="text-align:center">
                    <center>
                      <span class="label label-success">LUNAS</span>
                    </center>
                  </td>
                @elseif ($item->kriteria === "T" && $item->administrasi->bayar === 2450000)
                  <td style="text-align:center">
                    <center>
                      <span class="label label-success">LUNAS</span>
                    </center>
                  </td>
                @else
                  <td style="text-align:center">
                    <center>
                      <span class="label label-danger">BELUM LUNAS</span>
                    </center>
                  </td>
                @endif

                @if ($item->kriteria === "P")
                  <td style="text-align:center">
                    <center>
                      <span class="label label-info">Private</span>
                    </center>
                  </td>
                @elseif ($item->kriteria === "D")
                  <td style="text-align:center">
                    <center>
                      <small class="label label-warning">Group 2 Orang</small>
                    </center>
                  </td>
                @else
                  <td style="text-align:center">
                    <center>
                      <small class="label label-default">Group 3 Orang</small>
                    </center>
                  </td>
                @endif
                <td style="text-align:center"><small>Rp. {{ number_format($item->administrasi->bayar) }}</small></td>
                <td style="text-align:center"><small>Rp. {{ number_format($item->administrasi->sisa_bayar) }}</small></td>


                  @if ($item->kriteria === "P" && $item->administrasi->bayar === 3850000 )
                    <td style="text-align:center">
                      <center>
                        <span class="label label-success"><i class="fa fa-check"></i> LUNAS</span>

                      </center>
                    </td>
                  @elseif ($item->kriteria === "D" && $item->administrasi->bayar === 2875000 )
                    <td style="text-align:center">
                      <center>
                        <span class="label label-success"><i class="fa fa-check"></i> LUNAS</span>

                      </center>
                    </td>
                  @elseif ($item->kriteria === "T" && $item->administrasi->bayar === 2450000)
                    <td style="text-align:center">
                      <center>
                        <span class="label label-success"><i class="fa fa-check"></i> LUNAS</span>
                      </center>
                    </td>
                  @elseif ($item->pembayaran === "TL")
                      @php
                        $sisaP = 3850000-((int)$item->administrasi->bayar);
                        $sisaD = 2875000-((int)$item->administrasi->bayar);
                        $sisaT = 2450000-((int)$item->administrasi->bayar);
                      @endphp
                      <td style="text-align:center">
                        <a href="#" class="btn btn-warning btn-xs open-AddBookDialog"
                        @if ($item->kriteria == "P")
                          data-kriteria="Private"
                        @elseif ($item->kriteria == "D")
                          data-kriteria="Grup 2 Orang"
                        @else
                          data-kriteria="Grup 3 Orang"
                        @endif

                        @if ($item->kriteria == "P")
                          data-harga="3850000"
                        @elseif ($item->kriteria == "D")
                          data-harga="2875000"
                        @else
                          data-harga="2450000"
                        @endif

                        @if ($item->kriteria == "P")
                          data-sisa={{$sisaP}}
                        @elseif ($item->kriteria == "D")
                          data-sisa={{$sisaD}}
                        @else
                          data-sisa={{$sisaT}}
                        @endif

                        data-cicilan={{$item->administrasi->cicilan_ke}}
                        data-id={{$item->id}}

                        data-toggle="modal" data-target="#bayar"><i class="material-icons">attach_money</i> Bayar</a>
                      </td>
                  @endif

              </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    <!-- /.box-body -->
    </div>



@endsection

@section('js')
  <script type="text/javascript">
  $(document).on("click", ".open-AddBookDialog", function () {
     var krit = $(this).data('kriteria');
     var harga = $(this).data('harga');
     var sisa = $(this).data('sisa');
     var cicilan = $(this).data('cicilan');
     var id = $(this).data('id');
     document.getElementById('total').innerHTML = krit;
     document.getElementById('total_bayar').value = sisa;
     document.getElementById('cicilan').value = cicilan;
     document.getElementById('id').value = id;
});

  </script>
@endsection
