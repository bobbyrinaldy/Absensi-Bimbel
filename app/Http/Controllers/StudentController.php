<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Registration;
use App\Model\Administration;

class StudentController extends Controller
{
    public function index()
    {
      $data['siswa'] = Registration::with('user')->get();

      return view('/siswa/index',$data);
    }

    public function edit($id)
    {
      $data['siswa'] = Registration::find($id);

      return view('/siswa/edit',$data);
    }

    public function update(Request $request,$id)
    {
      $r = Registration::find($id);

      $r->nama = $request->nama;
      $r->nim = $request->nim;
      $r->fakultas = $request->fakultas;
      $r->asal_sekolah = $request->sekolah;
      $r->alamat = $request->alamat;
      $r->no_tlp = $request->no_tlp;
      $r->no_tlp_ortu = $request->no_tlp_ortu;
      $r->sosmed = $request->sosmed;
      $r->ipk = $request->ipk;
      $r->minat_prodi = $request->prodi;
      $r->jalur_terima = $request->jalur_terima;
      $r->kriteria = $request->kriteria;
      $r->pembayaran = $request->status;
      $r->user_id = $request->petugas;

      $r->save();

      $a = Administration::where('registration_id',$id)->first();

      $a->delete();

      $a->registration_id = $r->id;

      if ($r->pembayaran != $request->status) {
        if ($request->status == "L") {
          if ($request->kriteria === "P") {
            $a->bayar = 3850000;
          }elseif ($request->kriteria === "D") {
            $a->bayar = 2875000;
          }else {
            $a->bayar = 2450000;
          }
        }elseif ($request->status == "TL") {
          if ($request->kriteria === "P") {
            $a->bayar = 0;
            $a->sisa_bayar = 3850000;
            $a->cicilan_ke = 0;
          }elseif ($request->kriteria === "D") {
            $a->bayar = 0;
            $a->cicilan_ke = 0;
            $a->sisa_bayar = 2875000;
          }else {
            $a->cicilan_ke = 0;
            $a->bayar = 0;
            $a->sisa_bayar = 2450000;
          }
        }
      }


      $a->save();

      return redirect('/siswa');

    }

    public function delete($id)
    {
      $r = Registration::find($id);
      $r->delete();

      return back();

    }
}
