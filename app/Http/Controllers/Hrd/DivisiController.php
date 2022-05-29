<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use DataTables;

class DivisiController extends Controller
{
    public function getDivisi()
    {
        $divisi = Divisi::all();
        return DataTables::of($divisi)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                            <button class="btn btn-warning" data-id="' . $row['id'] . '" id="editDivisi">Update</button>
                            <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deleteDivisi">Delete</button>
                        </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addDivisi(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'nama_divisi' => 'required|string|max:255',
            'ket'         => ''
        ]);

        if (!$validate->passes()) {
            return response()->json(['code' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $divisi = new Divisi();
            $divisi->nama_divisi = $request->nama_divisi;
            $divisi->ket = $request->ket;
            $query = $divisi->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Gagal menambahkan divisi']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Berhasil menambahkan divisi!']);
            }
        }
    }

    public function deleteDivisi(Request $request)
    {
        $divisi_id = $request->divisi_id;
        $query = Divisi::find($divisi_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Berhasil menghapus divisi']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Gagal menghapus divisi']);
        }
    }

    public function detailDivisi(Request $request)
    {
        $divisi_id = $request->divisi_id;
        $divisiDetails = Divisi::find($divisi_id);
        return response()->json(['details' => $divisiDetails]);
    }

    public function updateDivisi(Request $request)
    {
        $divisi_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'nama_divisi' => 'required|unique:divisis,nama_divisi,' . $divisi_id,
            'ket' => ''
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $divisi = Divisi::find($divisi_id);
            $divisi->nama_divisi = $request->nama_divisi;
            $divisi->ket = $request->ket;
            $query = $divisi->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Data divisi berhasil diubah!']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }
}
