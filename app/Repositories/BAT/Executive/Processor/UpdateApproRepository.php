<?php

namespace App\Repositories\BAT\Executive\Processor;

use App\Models\AppropriationDetails;
use Illuminate\Support\Facades\DB;

class UpdateApproRepository{

    public function getDepartment($request)
    {
        try {

            $data = DB::select('call exec_appro_getdepartment(?,?)',array(
                $request->year,
                $request->fund_source,
            ));

            return response()->json(['status' => true, 'department' => $data, ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getProgram($request)
    {
        try {

            $data = DB::select('call exec_appro_getprogram(?,?)',array(
                $request->department,
                $request->appro_id,
            ));

            return response()->json(['status' => true, 'program' => $data, ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getProject($request)
    {
        try {

            $data = DB::select('call exec_appro_getproject(?,?)',array(
                $request->program,
                $request->appro_id,
            ));

            return response()->json(['status' => true, 'project' => $data, ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getActivity($request)
    {
        try {

            $data = DB::select('call exec_appro_getactivity(?,?,?)',array(
                $request->program,
                $request->project,
                $request->appro_id,
            ));

            return response()->json(['status' => true, 'acitivity' => $data, ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getApproInfo($request)
    {
        try {

            $data = DB::select('call exec_appro_getinfo(?,?)',array(
                $request->aipcode,
                $request->appro_id
            ));

            return response()->json(['status' => true, 'expense' => $data, ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }



    public function update($request)
    {
        $data = AppropriationDetails::where('id', $request->id);
        $data->update(['latest_appro_total' => $request->latest_appro_total,
                'latest_appro_amount' => $request->latest_appro_amount,
                'type' => 'Update']);

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }
}