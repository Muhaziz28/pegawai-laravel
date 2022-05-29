<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use DataTables;

class LokasiController extends Controller
{
    public function getLokasi()
    {
        $lokasi = Lokasi::all();
        return DataTables::of($lokasi)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                            <button class="btn btn-warning" data-id="' . $row['id'] . '" id="editLokasi">Update</button>
                            <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deleteLokasi">Delete</button>
                        </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addLokasi(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'nama_lokasi' => 'required|string|max:255',
            'alamat_lokasi' => 'required',
            'longitude' => '',
            'latitude' => '',
        ]);

        if (!$validate->passes()) {
            return response()->json(['code' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $lokasi = new Lokasi();
            $lokasi->nama_lokasi = $request->nama_lokasi;
            $lokasi->alamat_lokasi = $request->alamat_lokasi;
            $lokasi->longitude = $request->longitude;
            $lokasi->latitude = $request->latitude;
            $query = $lokasi->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Gagal menambahkan lokasi']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Berhasil menambahkan lokasi!']);
            }
        }
    }

    public function detailLokasi(Request $request)
    {
        $lokasi_id = $request->lokasi_id;
        $lokasiDetails = Lokasi::find($lokasi_id);
        return response()->json(['details' => $lokasiDetails]);
    }

    public function updateLokasi(Request $request)
    {
        $lokasi_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'nama_lokasi'   => 'required|unique:lokasis,nama_lokasi,' . $lokasi_id,
            'alamat_lokasi'    => 'required',
            'longitude'    => '',
            'latitude'    => '',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $lokasi = Lokasi::find($lokasi_id);
            $lokasi->nama_lokasi = $request->nama_lokasi;
            $lokasi->alamat_lokasi = $request->alamat_lokasi;
            $lokasi->longitude = $request->longitude;
            $lokasi->latitude = $request->latitude;

            $query = $lokasi->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Data lokasi berhasil diubah!']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }

    public function deleteLokasi(Request $request)
    {
        $lokasi_id = $request->lokasi_id;
        $query = Lokasi::find($lokasi_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data lokasi berhasil dihapus!']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
        }
    }
}
