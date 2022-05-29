<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use DataTables;

class GradeController extends Controller
{
    public function getGrade()
    {
        $grade = Grade::with('level')->get();
        return DataTables::of($grade)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
                            <button class="btn btn-warning" data-id="' . $row['id'] . '" id="editGrade">Update</button>
                            <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deleteGrade">Delete</button>
                        </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addGrade(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'id_level'     => 'required|numeric',
            'gaji_pokok'    => 'required|numeric',
            'tunjangan_kehadiran'   => 'required|numeric',
            'tunjangan_operasional' => 'required|numeric',
        ]);

        if (!$validate->passes()) {
            return response()->json(['code' => 0, 'error' => $validate->errors()->toArray()]);
        } else {
            $grade = new Grade();
            $grade->title = $request->title;
            $grade->id_level = $request->id_level;
            $grade->gaji_pokok = $request->gaji_pokok;
            $grade->tunjangan_kehadiran = $request->tunjangan_kehadiran;
            $grade->tunjangan_operasional = $request->tunjangan_operasional;
            $query = $grade->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Gagal menambahkan grade']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Berhasil menambahkan grade!']);
            }
        }
    }

    public function detailGrade(Request $request)
    {
        $grade_id = $request->grade_id;
        $gradeDetails = Grade::with('level')->where('id', $grade_id)->first();
        return response()->json(['details' => $gradeDetails]);
    }

    public function updateGrade(Request $request)
    {
        $grade_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'title'         => 'required|unique:grades,title,' . $grade_id,
            'id_level'      => 'required',
            'gaji_pokok'    => 'required',
            'tunjangan_kehadiran'   => 'required',
            'tunjangan_operasional' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $grade = Grade::with('level')->where('id', $grade_id)->first();
            $grade->title = $request->title;
            $grade->id_level = $request->id_level;
            $grade->gaji_pokok = $request->gaji_pokok;
            $grade->tunjangan_kehadiran = $request->tunjangan_kehadiran;
            $grade->tunjangan_operasional = $request->tunjangan_operasional;
            $query = $grade->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Data grade berhasil diubah!']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }

    public function deleteGrade(Request $request)
    {
        $grade_id = $request->grade_id;
        $query = Grade::find($grade_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Data grade berhasil dihapus!']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
        }
    }
}
