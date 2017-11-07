<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
      $data['teacher'] = teacher::with('user')->get();

      return view('/pengajar/index',$data);
    }

    public function create()
    {
      return view('/pengajar/create');
    }

    public function save(Request $request)
    {
      $t = new Teacher;

      $t->nama = $request->nama;
      $t->alamat = $request->alamat;
      $t->tempat_lahir = $request->tempat_lahir;
      $t->tgl_lahir = $request->tgl_lahir;
      $t->universitas = $request->universitas;
      $t->jurusan = $request->jurusan;
      $t->no_tlp = $request->no_tlp;
      $t->sosmed = $request->sosmed;
      $t->pendidikan = $request->pendidikan;
      $t->semester = $request->semester;
      $t->pengajar = $request->pengajar;
      $t->user_id = $request->petugas;

      $t->save();

      return redirect('/pengajar');
    }

    public function edit($id)
    {
      $data['t'] = Teacher::find($id);

      return view('/pengajar/edit',$data);
    }

    public function update(Request $request,$id)
    {
      $t = Teacher::find($id);

      $t->nama = $request->nama;
      $t->alamat = $request->alamat;
      $t->tempat_lahir = $request->tempat_lahir;
      $t->tgl_lahir = $request->tgl_lahir;
      $t->universitas = $request->universitas;
      $t->jurusan = $request->jurusan;
      $t->no_tlp = $request->no_tlp;
      $t->sosmed = $request->sosmed;
      $t->pendidikan = $request->pendidikan;
      $t->semester = $request->semester;
      $t->pengajar = $request->pengajar;
      $t->user_id = $request->petugas;

      $t->save();
      return redirect('/pengajar');
    }

    public function delete($id)
    {
      $t = Teacher::find($id);
      $t->delete();

      return back();
    }

}
