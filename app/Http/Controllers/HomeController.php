<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Registration;
use App\Model\Teacher;
use App\Model\Absence;
use App\Model\Group;
use App\User;
use Carbon\carbon;
use DB;
use Auth;
use Hash;
use Session;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $c= new carbon();
      $dt = Carbon::parse($c);

      $data['siswa_baru'] = Registration::whereMonth('created_at',$dt->month)->count();
      $data['tl'] = Registration::where('pembayaran','TL')->count();
      $data['teacher'] = Teacher::all()->count();
      $data['kelompok'] = Group::all()->count();
      $data['kbm'] = Absence::with('pengajar')->whereNull('selesai')->get();

      $data['siswa_daftar'] = Registration::orderBy('created_at','DESC')->get()->take(5);
      $data['siswa_bayar'] = Registration::with('administrasi')->orderBy('updated_at','DESC')->get()->take(5);

        return view('/index',$data);
    }

    public function change()
    {
      return view('change_password');
    }

    public function saveChange(Request $req,$id)
    {
      $this->validate($req, [
        'old_password' => 'required',
        'password' => 'required|min:6|confirmed',
      ]);

      $u = user::find($id);

      $oldPass = $req->old_password;
      $check = Hash::check($oldPass, $u->password);

      if ($check) {
        DB::table('users')
            ->where('id', $id)
            ->update(['password' => bcrypt($req->password)]);

        Session::flash('success', 'Password Successfully Changed');
        return back();
      }else {
        Session::flash('fail', 'Your old Password is not correct!');
        return back();
      }
    }
}
