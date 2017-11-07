<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Registration;
use App\Model\Administration;

class AdministrationController extends Controller
{
    public function index()
    {
      $data['r'] = Registration::with('administrasi')->get();

      return view('administrasi/index',$data);
    }

    public function bayar(Request $request)
    {
      $a = Administration::where('registration_id',$request->id)->first();
      $asal = $a->bayar;
      $baru = $request->akan_bayar;
      $hasil = $asal+$baru;

      $a->bayar = $hasil;
      $a->sisa_bayar = $request->total_bayar-$request->akan_bayar;
      $a->cicilan_ke = $request->cicilan+1;

      $a->save();

      if ($a->sisa_bayar == 0) {
        $r = Registration::find($request->id);
        $r->pembayaran = "L";
        $r->save();
      }

      return back();
    }
}
