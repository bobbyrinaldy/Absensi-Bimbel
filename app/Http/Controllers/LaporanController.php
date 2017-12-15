<?php

namespace App\Http\Controllers;

use App\Model\Absence;
use App\Model\Administration;
use Illuminate\Http\Request;
use DB;


class LaporanController extends Controller
{
    public function statistik_matkul()
    {
    	$data['m'] = Absence::where('matkul','M')->count();
    	$data['f'] = Absence::where('matkul','F')->count();
    	$data['k'] = Absence::where('matkul','K')->count();

    	return view('laporan/statistik_matkul',$data);
    }

    public function total_mengajar()
    {
    	$data['p'] = Absence::with('pengajar')->groupBy('teacher_id')->get(['teacher_id']);

    	return view('laporan/total_mengajar',$data);
    }

    public function total_konsultasi()
    {
    	$year = date('Y');
    	$data['jan'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-01%')
            ->first();
        $data['feb'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-02%')
            ->first();
        $data['mar'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-03%')
            ->first();
        $data['apr'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-04%')
            ->first();
        $data['may'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-05%')
            ->first();
        $data['jun'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-06%')
            ->first();
        $data['jul'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-07%')
            ->first();
        $data['aug'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-08%')
            ->first();
        $data['sep'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-09%')
            ->first();
        $data['oct'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-10%')
            ->first();
        $data['nov'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-11%')
            ->first();
        $data['des'] = DB::table('consultations')
            ->selectRaw('count(*) as total')
            ->where('consultations.tanggal', 'LIKE', $year.'-12%')
            ->first();

    	return view('laporan/total_konsultasi',$data);
    }

    public function siswa_belum_lunas()
    {
    	$data['siswa'] = Administration::with('registrasi')->where('sisa_bayar','!=','0')->get();

    	return view('laporan/siswa_belum_lunas',$data);
    }
}
