<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Level;
use DataTables;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function getLevel()
    {
        $level = Level::all();
        return DataTables::of($level)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                                                 <button class="btn btn-warning" data-id="' . $row['id'] . '" id="editLevel">Update</button>
                                                 <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deleteLevel">Delete</button>
                                           </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addLevel(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'nama_level' => 'required|string|max:255',
            'ket'        => ''
        ]);

        if (!$validate->passes()) {
            return response()->json(['code' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $level = new Level();
            $level->nama_level = $request->nama_level;
            $level->ket = $request->ket;
            $query = $level->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Gagal menambahkan level']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Berhasil menambahkan level!']);
            }
        }
    }

    public function detailLevel(Request $request)
    {
        $level_id = $request->level_id;
        $levelDetails = Level::find($level_id);
        return response()->json(['details' => $levelDetails]);
    }

    public function updateLevel(Request $request)
    {
        $level_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'nama_level' => 'required|unique:levels,nama_level,' . $level_id,
            'ket' => ''
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $level = Level::find($level_id);
            $level->nama_level = $request->nama_level;
            $level->ket = $request->ket;
            $query = $level->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Data level berhasil diubah!']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }

    public function deleteLevel(Request $request)
    {
        $level_id = $request->level_id;
        $query = Level::find($level_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data level berhasil dihapus!']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
        }
    }
}
