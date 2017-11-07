@extends('layouts.master')

@section('title','Registration')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" data-background-color="red">
            <h4 class="title">Form Pendaftaran</h4>
          </div>
            <form class="form-horizontal"  action="/siswa/update/{{$siswa->id}}" method="post">
                    {{ csrf_field() }}

              <div class="row">
                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="name" class="control-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Siswa Pendaftar" value="{{$siswa->nama}}" >

                      @if ($errors->has('nama'))
                        <span class="help-block">
                          <strong style="color:red;">{{ $errors->first('nama') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                  <label for="fakultas" class="control-label">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas Siswa Pendaftar" value="{{$siswa->fakultas}}" >
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="nim" class=" control-label">NIM</label>
                      <input type="text" maxlength="13" class="form-control" id="nim" name="nim" placeholder="NIM Siswa Pendaftar di Fakultas" value="{{ $siswa->nim }}" onKeypress="return n(event)">
                    </div>
                  </div>
                </div>



                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="no_tlp" class="control-label">No Telepon/Hp</label>
                      <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="No Hp Siswa Pendaftar" value="{{ $siswa->no_tlp }}" >
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-md-6" style="width:42%;">
                <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                  <label for="sekolah" class="control-label">Asal Sekolah</label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Asal Sekolah Siswa Pendaftar" value="{{ $siswa->asal_sekolah }}" >
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-12 col-md-offset-1">
                  <label for="alamat" class="control-label">Alamat Rumah/Kosan</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Siswa Pendaftar" value="{{ $siswa->alamat }}" >
                  </div>
                </div>
              </div>

              </div>



              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="no_tlp_ortu" class=" control-label">No Telepon Orang Tua</label>
                      <input type="text" maxlength="13" class="form-control" id="no_tlp_ortu" name="no_tlp_ortu" placeholder="No Telepon Orang Tua Siswa Pendaftar" value="{{ $siswa->no_tlp_ortu }}" onKeypress="return n(event)">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="sosmed" class="control-label">ID Line/BBM</label>
                      <input type="text" class="form-control" id="sosmed" name="sosmed" placeholder="ID Line/BBM Siswa Pendaftar" value="{{ $siswa->sosmed }}" >
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                      <label for="ipk" class=" control-label">Harapan IPK</label>
                      <input type="text" maxlength="13" class="form-control" id="ipk" name="ipk" placeholder="Harapan IPK Siswa Pendaftar" value="{{ $siswa->ipk }}" onKeypress="return n(event)">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                    <label for="prodi" class="control-label">Harapan Prodi/Prodi Peminatan</label>
                      <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Harapan Prodi Siswa Pendaftar" value="{{ $siswa->minat_prodi }}" >
                    </div>
                  </div>
                </div>

              </div>

                <div class="col-md-6" style="width:42%;">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="jalur_terima" class=" control-label">Diterima Jalur</label>
                        <select class="form-control"  name="jalur_terima">
                          <option value="SBMPTN" {{ $siswa->jalur_terima == "SBMPTN" ? "selected":"" }}>SBMPTN</option>
                          <option value="SNMPTN" {{ $siswa->jalur_terima == "SNMPTN" ? "selected":"" }}>SNMPTN</option>
                          <option value="SNMPTNP" {{ $siswa->jalur_terima == "SNMPTNP" ? "selected":"" }}>SNMPTN Peminatan</option>
                          <option value="LAINNYA" {{ $siswa->jalur_terima == "LAINNYA" ? "selected":"" }}>LAINNYA</option>
                        </select>
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group" >
                    <div class="col-md-12 col-md-offset-1">
                      <label for="kriteria" class=" control-label">Kriteria</label>
                        <select class="form-control"  name="kriteria">
                          <option value="P" {{ $siswa->kriteria == "P" ? "selected":"" }}>Private</option>
                          <option value="D" {{ $siswa->kriteria == "D" ? "selected":"" }}>Grup 2 Orang</option>
                          <option value="T" {{ $siswa->kriteria == "T" ? "selected":"" }}>Grup 3 Orang</option>
                        </select>

                      </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6" style="width:42%;">
                    <div class="form-group" >
                      <div class="col-md-12 col-md-offset-1">
                        <label for="status" class=" control-label">Pembayaran</label>
                          <select class="form-control"  name="status" id="status">
                            <option value="L" {{ $siswa->pembayaran == "L" ? "selected":"" }}>Lunas</option>
                            <option value="TL" {{ $siswa->pembayaran == "TL" ? "selected":"" }}>Cicil 2x</option>
                          </select>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-md-12 col-md-offset-1">
                      <label for="petugas" class="control-label">Petugas yang menginput</label>
                      <input type="hidden" class="form-control" id="petugas" name="petugas" value="{{auth::user()->id}}" readonly>
                        <input type="text" class="form-control" id="" name="" value="{{auth::user()->name}}" readonly>
                      </div>
                    </div>
                  </div>
                </div>

              <div class="form-group" >
                <center>
                  <div class="col-md-11">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <input type="hidden" name="_method" value="put">
                  </div>
                </center>
              </div>

            </form>
          </div>

        </div>

      </div>

    </div>
@endsection
