<?php

namespace App\Repositories\BAT\Executive\Processor;

use Illuminate\Support\Facades\DB;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;

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


    public function updateAppro($request){
        try {

            $adjustment = AppropriationExpenses::latest()->where('appro_id', $request->appro_id)->get();

            foreach ($adjustment as $data) {
                $adjustment = $data->adjustemt_id;
            }

            if($adjustment == null){
                $adjst = "adjst_1";
                return "wala";
            }else{
                $adjust = substr($adjustment, -1);
                $adjst = ++$adjust;
            }

            AppropriationDetails::where('appro_id', $request->appro_id)->update(['type' => "Update"]);

            AppropriationExpenses::create([
                'appro_id' => $request->appro_id,
                'AIPCode' => $request->aipcode,
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'adjustemt_id' => $adjst,
                'latest_appro_amount' => $request->balance,
                'adjustment_date' => $request->date,
                'adjustment_type' => $request->adjustment_type,
                'adjustment_no' => $request->adjustment_no,
                'addition' => $request->addition,
                'deduction' => $request->deduction,
                'balance' => $request->balance,
            ]);

            // for($i=0; $i<count($request->account_code); $i++){
            //     AppropriationUpdate::create([
            //         'appro_id' => $request->appro_id,
            //         'AIPCode' => $request->aipcode,
            //         'document_source' => $request->document_source, 
            //         'date' => $request->date,
            //         'adjustment_type' => $request->adjustment_type,
            //         'adjustment_no' => $request->adjustment_no,
            //         'account_code' => $request->account_code[$i],
            //         'account_name' => $request->account_name[$i],
            //         'balance' => $request->balance[$i],
            //         'addition' => $request->addition[$i],
            //         'deduction' => $request->deduction[$i],
            //         'latest_balance' => $request->balance[$i],
            //     ]);
            // }

            // $updateAccCode = AppropriationExpenses::where('appro_id', $request->approId)
            //     ->where('AIPCode', $request->aipcode)
            //     ->where('account_code', $request->account_code);
            // $updateAccCode->update(['latest_appro_amount' => $request->latest_balance]);

            // return response()->json([
            //     'status' => true,
            //     'message' => 'Success!'
            // ]);


        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);

        }
    }
}