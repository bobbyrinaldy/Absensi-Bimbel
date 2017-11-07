<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use App\Model\Subgroup;
use App\Model\Registration;
use DB;

class GroupController extends Controller
{
    public function index()
    {
      $data['kelompok'] = group::with('subgroup','user')->get();

      return view('kelompok/index',$data);
    }

    public function create()
    {
      $data['siswa'] = Registration::all();
      $data['p'] = Registration::where('kriteria','P')->get();
      $data['d'] = Registration::where('kriteria','D')->get();
      $data['t'] = Registration::where('kriteria','T')->get();
      return view('kelompok/create',$data);
    }

    public function save(Request $request)
    {
      $g = new Group;
      $g->nama_grup = $request->nama;
      $g->kriteria = $request->kriteria;
      $g->user_id = $request->petugas;
      $g->save();

      for ($i=0; $i <  count($request->siswa) ; $i++) {
        Subgroup::create([
          'group_id' => $g->id,
          'registration_id' => $request->siswa[$i]
        ]);
      }

      return back();
    }

    public function edit($id)
    {
      $kriteria = group::find($id);
      $data['grup'] = group::find($id);
      $data['kelompok'] = Subgroup::where('group_id',$id)->pluck('registration_id')->toArray();
      // $data['siswa'] = Registration::where('kriteria',$kriteria->kriteria)->get();
      $data['siswa']= DB::select(DB::raw("SELECT * FROM Registrations where id not in (SELECT registration_id from subgroups) and kriteria = '$kriteria->kriteria' or id in (SELECT registration_id from subgroups where group_id = '$id')"));

      return view('kelompok/edit',$data);
    }

    public function search(Request $request)
    {
      $r = $request->get('kriteria');
      if ($r == "P") {
        $data = DB::select(DB::raw("SELECT * FROM Registrations where id not in (SELECT registration_id from subgroups) and kriteria = 'P' "));
      }else if ($r == "D")  {
        $data = DB::select(DB::raw("SELECT * FROM Registrations where id not in (SELECT registration_id from subgroups) and kriteria = 'D' "));
      }else {
        $data = DB::select(DB::raw("SELECT * FROM Registrations where id not in (SELECT registration_id from subgroups) and kriteria = 'T' "));
      }

      return $data;
    }

    public function update(Request $request,$id)
    {
      $g = Group::find($id);

      $g->nama_grup = $request->nama;
      $g->kriteria = $request->kriteria;
      $g->user_id = $request->petugas;

      Subgroup::where('group_id',$id)->delete();

      for ($i=0; $i < count($request->siswa) ; $i++) {
          Subgroup::create([
            'group_id' => $g->id,
            'registration_id' => $request->siswa[$i]
          ]);
        }

        $g->save();


      return redirect('/kelompok');

    }

    public function delete($id)
    {
      $g = Group::find($id);

      $g->delete();
      return back();
    }
}
