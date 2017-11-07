<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Consultation;
use App\Model\Registration;
use App\Model\Teacher;
use App\Model\Subconsult;
use DB;

class ConsultationController extends Controller
{
    public function index()
    {
      $data['konsul'] = Consultation::with('pengajar')->get();

      return view('absen/konsultasi/index',$data);
    }

    public function create()
    {
      $data['siswa'] = Registration::all();
      $data['teacher'] = Teacher::all();

      return view('absen/konsultasi/create',$data);
    }

    public function save(Request $request)
    {
      $c = new Consultation;

      $c->tanggal           = $request->tanggal;
      $c->teacher_id        = $request->pengajar;
      $c->waktu             = $request->waktu;
      $c->tempat            = $request->tempat;
      $c->keterangan        = $request->keterangan;

      $c->save();

      $con = Consultation::all()->last();


      for ($i=0; $i <  count($request->siswa) ; $i++) {
        Subconsult::create([
          'consultation_id' => $con->id,
          'registration_id' => $request->siswa[$i]
        ]);
      }



      return redirect('/absen_konsultasi');
    }

    public function edit($id)
    {
      $data['con'] = Consultation::find($id);
      $data['subcon'] = subconsult::where('consultation_id',$id)->pluck('registration_id')->toArray();
      $data['siswa']= DB::select(DB::raw("SELECT * FROM Registrations where id not in (SELECT registration_id from subconsult) or id in (SELECT registration_id from subconsult where consultation_id = '$id')"));
      $data['pengajar'] = Teacher::all();


      return view('/absen/konsultasi/edit',$data);
    }

    public function update(Request $request,$id)
    {
      $c = Consultation::find($id);

      $c->tanggal           = $request->tanggal;
      $c->teacher_id        = $request->pengajar;
      $c->waktu             = $request->waktu;
      $c->tempat            = $request->tempat;
      $c->keterangan        = $request->keterangan;

      $c->save();

      Subconsult::where('consultation_id',$id)->delete();

      for ($i=0; $i <  count($request->siswa) ; $i++) {
        Subconsult::create([
          'consultation_id' => $c->id,
          'registration_id' => $request->siswa[$i]
        ]);
      }
      return redirect('/absen_konsultasi');

    }

    public function delete($id)
    {
      $c = Consultation::find($id);

      $c->delete();

      return back();
    }
}
