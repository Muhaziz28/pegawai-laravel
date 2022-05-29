<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use DataTables;

class JabatanController extends Controller
{
    public function addJabatan(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
            'id_divisi' => 'required',
            'ket' => ''
        ]);
        if (!$validate->passes()) {
            return response()->json(['code' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $jabatan = new Jabatan();
            $jabatan->nama_jabatan = $request->nama_jabatan;
            $jabatan->id_divisi = $request->id_divisi;
            $jabatan->ket = $request->ket;
            $query = $jabatan->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Gagal menambahkan jabatan!']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Jabatan berhasil ditambahkan!']);
            }
        }
    }

    public function getJabatan()
    {
        if (request()->input('divisi') != null) {
            $jabatan = Jabatan::with('divisi')->where('id_divisi', request()->input('divisi'))->get();
        } else {
            $jabatan = Jabatan::with('divisi')->get();
        }

        return DataTables::of($jabatan)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                                                <button class="btn btn-warning" data-id="' . $row['id'] . '" id="editJabatan">Update</button>
                                                <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deleteJabatan">Delete</button>
                                          </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function detailJabatan(Request $request)
    {
        $jabatan_id = $request->jabatan_id;
        $jabatanDetails = Jabatan::with('divisi')->where('id', $jabatan_id)->first();
        return response()->json(['details' => $jabatanDetails]);
    }

    public function updateJabatan(Request $request)
    {
        $jabatan_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'nama_jabatan' => 'required|unique:jabatans,nama_jabatan,' . $jabatan_id,
            'id_divisi' => 'required',
            'ket' => ''
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $jabatan = Jabatan::find($jabatan_id);
            $jabatan->nama_jabatan = $request->nama_jabatan;
            $jabatan->id_divisi = $request->id_divisi;
            $jabatan->ket = $request->ket;
            $query = $jabatan->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Data jabatan berhasil diubah!']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }

    public function deleteJabatan(Request $request)
    {
        $jabatan_id = $request->jabatan_id;
        $query = Jabatan::find($jabatan_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data jabatan berhasil dihapus!']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
        }
    }
}
