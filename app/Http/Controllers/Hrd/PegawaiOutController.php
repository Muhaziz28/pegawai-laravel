<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class PegawaiOutController extends Controller
{
    public function getPegawaiOut()
    {
        $pegawai = User::with(
            ['divisi', 'jabatan', 'level', 'lokasi', 'grade']
        )->where('is_out', 0)->get();

        return DataTables::of($pegawai)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '
                <div class="btn-group"> 
                    <button class="btn btn-primary" data-id="' . $row['id'] . '" id="inPegawai">Masukkan</button>
                </div>
            ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    // ! Detail Pegawai Out
    public function detailPegawaiOut(Request $request)
    {
        $pegawai_id = $request->pegawai_id;
        $pegawaiDetails = User::with('divisi', 'jabatan', 'level', 'lokasi', 'grade')->find($pegawai_id);
        return response()->json(['details' => $pegawaiDetails]);
    }

    public function inPegawai(Request $request)
    {
        $pegawai_id = $request->id;

        $pegawai = User::find($pegawai_id);
        $pegawai->is_out = 1;
        $pegawai->alasan = null;
        $pegawai->alasan_keluar = null;
        $query = $pegawai->save();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Pegawai berhasil dimasukkan!']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
        }
    }
}
