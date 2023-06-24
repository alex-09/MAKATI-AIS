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

            $adjustment = AppropriationExpenses::latest()->where('appro_id', $request->appro_id)->first();
            
            $adjustment = $adjustment->adjustemt_id;
            
                if($adjustment == null){
                    $adjst = "adjst_1";
                }else{
                    $adjust = (int)substr($adjustment, 6, 20);
                    $adjst = ++$adjust;
                }

            AppropriationDetails::where('appro_id', $request->appro_id)->update(['type' => "Update"]);

            foreach($request->details_form as $details){
                    $expenses = $details['expense'];
                foreach($expenses as $expense_details){
                    AppropriationExpenses::create([
                        'appro_id' => $expense_details['appro_id'],
                        'AIPCode' => $expense_details['AIPCode'],
                        'adjustemt_id' => "adjst_".$adjst,
                        'document_source' => $request->source_document, 
                        'date' => $request->date_of_document,
                        'adjustment_type' => $request->type_of_adjustment,
                        'adjustment_no' => $request->adjustment_no,
                        'account_code' => $expense_details['account_code'],
                        'account_name' => $expense_details['account_name'],
                        // 'balance' => $request->balance,
                        'addition' => $expense_details['addition'],
                        'deduction' => $expense_details['deduction'],
                        // 'latest_balance' => $request->balance,
                    ]);

                    }
            }

            return response()->json([
                'status' => true,
                'message' => 'update success!',
                'appro_id' =>  $request->appro_id,
                'aip_code' => $request->aip_code
            ]);


        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);

        }
    }
}