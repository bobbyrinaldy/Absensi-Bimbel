<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Registration;
use App\Model\Teacher;
use App\Model\Group;
use Carbon\carbon;
use DB;

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

      $data['siswa_daftar'] = Registration::orderBy('created_at','DESC')->get()->take(5);
      $data['siswa_bayar'] = Registration::with('administrasi')->orderBy('updated_at','DESC')->get()->take(5);

        return view('/index',$data);
    }
}
