<?php

namespace App\Http\Controllers;

use App\Model\Absence;
use App\Model\Group;
use App\Model\Subgroup;
use App\Model\Teacher;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;


class AbsenceController extends Controller
{
    public function index()
    {
      $data['absen'] = Absence::with('kelompok','pengajar')->get();

      return view('absen/kelas/index',$data);
    }

    public function create()
    {
      $data['P'] = Group::where('kriteria','P')->get();
      $data['D'] = Group::where('kriteria','D')->get();
      $data['T'] = Group::where('kriteria','T')->get();
      $data['user'] = User::where('id',Auth::user()->id)->first();
      $data['teacher'] = Teacher::find($data['user']->teacher_id);
      // dd($data['teacher']);

      return view('absen/kelas/create',$data);
    }

    public function save(Request $request)
    {
      $ab = new Absence;

      $ab->tanggal    = $request->tanggal;
      $ab->group_id   = $request->kelompok;
      $ab->teacher_id = $request->pengajar;
      $ab->matkul     = $request->matkul;
      $ab->waktu      = $request->waktu;
      $ab->tempat     = $request->tempat;
      $ab->keterangan = $request->keterangan;
      $ab->user_id    = $request->petugas;

      $ab->save();

      return redirect('/absen_kelas');

    }

    public function edit($id)
    {
      $data['absen'] = Absence::find($id);
      $data['P'] = Group::where('kriteria','P')->get();
      $data['D'] = Group::where('kriteria','D')->get();
      $data['T'] = Group::where('kriteria','T')->get();

      return view('/absen/kelas/edit',$data);
    }

    public function update(Request $request,$id)
    {
      $ab = Absence::find($id);



      $ab->tanggal    = $request->tanggal;
      $ab->group_id   = $request->kelompok;
      $ab->teacher_id = $request->pengajar;
      $ab->matkul     = $request->matkul;
      $ab->tempat     = $request->tempat;
      $ab->keterangan = $request->keterangan;
      $ab->user_id    = $request->petugas;

      $ab->save();

      return redirect('/absen_kelas');
    }

    public function delete($id)
    {
      $ab = Absence::find($id);

      $ab->delete();
      
      return back();
    }

    public function search(Request $request)
    {
      $r = $request->get('matkul');
      if ($r == "M") {
        $data = Teacher::where('pengajar','M')->get();
      }else if ($r == "F") {
        $data = Teacher::where('pengajar','F')->get();
      }else if ($r == "K") {
        $data = Teacher::where('pengajar','K')->get();
      }

      return $data;

    }

    public function selesai($id)
    {
      $date = Date('h:m:s');

      DB::table('absences')
            ->where('id', $id)
            ->update([
              'selesai' => $date
            ]);

      $absen = Absence::find($id);

      $mk = strtotime($absen->waktu);
      $mk2 = strtotime($absen->selesai);
      $diff = $mk2-$mk;
      $hours = floor($diff / 60);

      DB::table('absences')
            ->where('id', $id)
            ->update([
              'durasi' => $hours,
            ]);

      
      return back();
    }
}
