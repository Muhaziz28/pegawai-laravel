<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HrdController extends Controller
{
    public function index()
    {
        return view('dashboard.hrd.index');
    }

    public function divisi()
    {
        return view('dashboard.hrd.divisi');
    }

    public function jabatan()
    {
        $data['divisi'] = Divisi::all();
        $data['jabatan'] = Jabatan::all()->count();
        return view('dashboard.hrd.jabatan', $data);
    }

    public function level()
    {
        return view('dashboard.hrd.level');
    }

    public function grade()
    {
        $data['level'] = Level::all();
        return view('dashboard.hrd.grade', $data);
    }

    public function lokasi()
    {
        return view('dashboard.hrd.lokasi');
    }

    public function pegawaiAktif()
    {
        $data['user'] = DB::table('users')->where('is_out', '=', 1)->count();
        $data['hrd'] = DB::table('users')->where('id_divisi', '=', 8)->where('is_out', '=', 1)->count();
        $data['finance'] = DB::table('users')->where('id_divisi', '=', 9)->where('is_out', '=', 1)->count();
        $data['kreatif'] = DB::table('users')->where('id_divisi', '=', 7)->where('is_out', '=', 1)->count();
        $data['marketing'] = DB::table('users')->where('id_divisi', '=', 6)->where('is_out', '=', 1)->count();
        $data['gudang'] = DB::table('users')->where('id_divisi', '=', 5)->where('is_out', '=', 1)->count();
        $data['produksi'] = DB::table('users')->where('id_divisi', '=', 4)->where('is_out', '=', 1)->count();
        $data['umum'] = DB::table('users')->where('id_divisi', '=', 3)->where('is_out', '=', 1)->count();
        $data['hers'] = DB::table('users')->where('id_divisi', '=', 2)->where('is_out', '=', 1)->count();
        $data['rumah'] = DB::table('users')->where('id_divisi', '=', 1)->where('is_out', '=', 1)->count();
        return view('dashboard.hrd.pegawai-aktif', $data);
    }

    public function pegawaiOut()
    {
        return view('dashboard.hrd.pegawai-out');
    }

    public function addPegawaiView()
    {
        $data['divisis'] = DB::table('divisis')->get();
        $data['levels'] = DB::table('levels')->get();
        $data['lokasis'] = DB::table('lokasis')->get();
        $data['jabatans'] = DB::table('jabatans')->get();

        return view('dashboard.hrd.add-pegawai', $data);
    }

    public function aktivitas()
    {
        return view('dashboard.hrd.activity');
    }

    public function aktivitasPegawai()
    {
        $data['pegawai'] = User::all();
        $data['divisi'] = Divisi::all();
        return view('dashboard.hrd.activity-all', $data);
    }

    public function rekapAktivitas()
    {
        return view('dashboard.hrd.rekap-aktivitas');
    }
}
