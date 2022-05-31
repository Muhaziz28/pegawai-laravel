<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiAktifController extends Controller
{
    public function getPegawaiAktif()
    {
        $pegawai = User::with(
            ['divisi', 'jabatan', 'level', 'lokasi', 'grade']
        )->where('is_out', 1)->get();

        return DataTables::of($pegawai)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '
                <div class="btn-group">
                            <button class="btn btn-primary" data-id="' . $row['id'] . '" id="editPegawai">Update</button>
                            <button class="btn btn-info" data-id="' . $row['id'] . '" id="detailPegawai">Detail</button>
                            <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deletePegawai">Delete</button>
                            <button class="btn btn-dark" data-id="' . $row['id'] . '" id="outPegawai">Keluar</button>
                        </div>
                        ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function pegawaiGetGrade(Request $request)
    {
        $id_level = $request->post('id_level');
        $grades = DB::table('grades')
            ->join('levels', 'levels.id', '=', 'grades.id_level')
            ->where('id_level', $id_level)->orderBy('title', 'asc')->get();
        $html = '<option value="">--Pilih Grade--</option>';
        foreach ($grades as $grade) {
            $html .= '<option value="' . $grade->id . '">' . $grade->title . ' - ' . $grade->nama_level . '</option>';
        }

        return $html;
    }

    public function pegawaiGetJabatan(Request $request)
    {
        $id_divisi = $request->post('id_divisi');
        $jabatans = DB::table('jabatans')->where('id_divisi', $id_divisi)->orderBy('nama_jabatan', 'asc')->get();
        $html = '<option value="">--Pilih Jabatan--</option>';
        foreach ($jabatans as $jabatan) {
            $html .= '<option value="' . $jabatan->id . '">' . $jabatan->nama_jabatan . '</option>';
        }

        return $html;
    }

    public function nipGenerator($tahub_masuk, $jenis_kelamin, $id)
    {
        $nip = $jenis_kelamin . $tahub_masuk . $id;
        return $nip;
    }

    public function addPegawai(Request $request)
    {
        $tanggal_masuk = date('Y-m-d', strtotime($request->post('tanggal_masuk')));
        $tahun_masuk = date_format(new \DateTime($tanggal_masuk), 'y');
        $jenis_kelamin = $request->jenis_kelamin == 'Laki-Laki' ? '01' : '02';
        $id = DB::table('users')->max('id');
        $id = $id + 1;
        $id = str_pad($id, 4, '0', STR_PAD_LEFT);
        $nip = $this->nipGenerator($tahun_masuk, $jenis_kelamin, $id);

        $validator = \Validator::make($request->all(), [
            'nik' => '',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'status_pegawai' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'pendidikan' => '',
            'id_divisi' => 'required',
            'id_jabatan' => 'required',
            'id_level' => 'required',
            'id_lokasi' => 'required',
            'id_grade' => '',
            'tgl_masuk' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password_view' => 'required',
            'ukuran_baju' => '',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if ($request->image != null) {
                $path  = 'public/images/';
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();

                $upload = $image->storeAs($path, $filename, 'public');
            } else {
                $filename = null;
                $upload = null;
            }
            // ubah format tanggal dari d/m/Y menjadi Y-m-d
            $tgl_lahir = date('Y-m-d', strtotime($request->post('tgl_lahir')));
            $tgl_masuk = date('Y-m-d', strtotime($request->post('tgl_masuk')));
            $tgl_mulai_kontrak = date('Y-m-d', strtotime($request->post('tgl_mulai_kontrak')));
            $tgl_akhir_kontrak = date('Y-m-d', strtotime($request->post('tgl_selesai_kontrak')));

            $query = User::create([
                'nip' => $nip,
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'status' => $request->status,
                'status_pegawai' => $request->status_pegawai,
                'alamat' => $request->alamat,
                'nohp' => $request->nohp,
                'pendidikan' => $request->pendidikan,
                'id_divisi' => $request->id_divisi,
                'id_jabatan' => $request->id_jabatan,
                'id_level' => $request->id_level,
                'id_lokasi' => $request->id_lokasi,
                'id_grade' => $request->id_grade,
                'tgl_masuk' => $tgl_masuk,
                'tgl_mulai_kontrak' => $tgl_mulai_kontrak,
                'tgl_akhir_kontrak' => $tgl_akhir_kontrak,
                'image' => $upload,
                'password_view' => $request->password_view,
                'is_out' => 1,
                'password' => Hash::make($request->password_view),
            ]);

            if ($query) {
                return redirect()->route('hrd.pegawaiAktif')->with('success', 'Pegawai berhasil ditambahkan!');
            } else {
                return redirect()->route('hrd.pegawaiAktif')->with('error', 'Pegawai gagal ditambahkan!');
            }
        }
    }

    public function deletePegawai(Request $request)
    {
        $pegawai = User::find($request->user_id);
        $path = 'uploads/image/';
        $image_path = $path . $pegawai->image;
        if ($pegawai->image != null && \Storage::disk('public')->exists($image_path)) {

            \Storage::disk('public')->delete($image_path);
        }
        $query = $pegawai->delete();
        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data Pegawai Berhasil Dihapus']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Data Pegawai Gagal Dihapus']);
        }
    }

    // ! Detail Pegawai
    public function detailPegawai(Request $request)
    {
        $pegawai_id = $request->pegawai_id;
        $pegawaiDetails = User::with('divisi', 'jabatan', 'level', 'lokasi', 'grade')->find($pegawai_id);
        return response()->json(['details' => $pegawaiDetails]);
    }

    public function keluarPegawai(Request $request)
    {
        $pegawai_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'alasan' => 'required|unique:users,nip,' . $pegawai_id,
            'alasan_lainnya' => ''
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $pegawai = User::find($pegawai_id);
            $pegawai->is_out = 0;

            $pegawai->alasan = $request->alasan;
            $pegawai->alasan_keluar = $request->alasan_keluar;
            $query = $pegawai->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Pegawai berhasil dikeluarkan!']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }
}
