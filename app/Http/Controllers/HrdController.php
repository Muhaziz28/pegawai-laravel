<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\Level;
use Illuminate\Http\Request;

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
        return view('dashboard.hrd.pegawai-aktif');
    }
}
