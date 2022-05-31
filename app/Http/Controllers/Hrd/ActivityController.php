<?php

namespace App\Http\Controllers\Hrd;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function getActivity()
    {
        $activity = Activity::with('user')->where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return DataTables::of($activity)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                // disable button action
                if (date('Y-m-d') > $row->created_at) {

                    $btn = '<button class="btn btn-primary disabled" disabled="disabled">Update</button>';
                    $btn = $btn . ' <button class="btn btn-danger disabled" disabled="disabled">Delete</button>';
                } else {
                    $btn = '<button class="btn btn-primary" data-id="' . $row['id'] . '" id="editAktivitas">Update</button>';
                    $btn = $btn . ' <button class="btn btn-danger" data-id="' . $row['id'] . '" id="deleteAktivitas">Delete</button>';
                }

                return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function getActivityAll()
    {
        $activity = Activity::with('user')->orderBy('created_at', 'desc')->get();

        return DataTables::of($activity)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $btn = '<button class="btn btn-info" ">Detail</button>';
                return $btn;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addActivity(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            // 'nip' => 'required',
            'isi_aktivitas' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'realisasi' => 'required',
        ]);

        if (!$validate->passes()) {
            return response()->json(['code' => 0, 'error' => $validate->errors()->toArray()]);
        } else {

            foreach ($request->isi_aktivitas as $key => $insert) {
                $saveRecord = [
                    // 'nip' => Auth::user()->nip,
                    'id_user' => Auth::user()->id,
                    'isi_aktivitas' => $request->isi_aktivitas[$key],
                    'mulai' => $request->mulai[$key],
                    'selesai' => $request->selesai[$key],
                    'realisasi' => $request->realisasi[$key],
                    'target' => $request->target[$key],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                DB::table('activities')->insert($saveRecord);
            }

            // cek data berhasil diinput

            return response()->json(['code' => 1, 'msg' => 'Data berhasil diinput']);
        }
    }

    public function deleteActivity(Request $request)
    {
        $activity_id = $request->activity_id;
        $query = Activity::find($activity_id)->delete();

        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Data aktivitas gagal dihapus']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Data aktivitas berhasil dihapus']);
        }
    }

    public function detailActivity(Request $request)
    {
        $activity_id = $request->activity_id;
        $actiivityDetails = Activity::with('user')->where('id', $activity_id)->first();

        return response()->json(['details' => $actiivityDetails]);
    }

    public function updateActivity(Request $request)
    {
        $activity_id = $request->id;

        $validator = \Validator::make($request->all(), [
            'isi_aktivitas' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'realisasi' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $activity = Activity::find($activity_id);
            $activity->isi_aktivitas = $request->isi_aktivitas;
            $activity->mulai = $request->mulai;
            $activity->selesai = $request->selesai;
            $activity->realisasi = $request->realisasi;
            $activity->target = $request->target;

            $query = $activity->save();
            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Activity berhasil diupdate']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan!']);
            }
        }
    }

    public function getRekapActivity()
    {
        // loop user table
        $user = User::where('is_out', 0)->get();

        // jika nip user pada table activity ada pada tanggal tertentu, beri return 1
        foreach ($user as $key => $value) {
            $activity = Activity::where('id_user', $value->id)->where('created_at', '>=', date('Y-m-d'))->get();
            if ($activity->count() > 0) {
                $user[$key]->status = 1;
            } else {
                $user[$key]->status = 0;
            }
        }

        return DataTables::of($user)
            ->addIndexColumn()
            ->make(true);
    }
}
