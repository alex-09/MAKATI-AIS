<?php

namespace App\Http\Controllers\Allotment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Allotment;
use App\Models\Expenses;

class UpdateAllotmentController extends Controller
{
    public function filter(Request $request){
        try{

            $data = DB::select('CALL filterAllot(?,?,?,?,?,?,?)',array(
                $request->budyear,
                $request->approtype,
                $request->sourcedocu,
                $request->office,
                $request->prog,
                $request->proj,
                $request->act
            ));

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $data
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request){
        try{

            $allot = Allotment::where('id', $request->id);
            $allot->update(['adjustment_type' => $request->adjustment_type,
                            'supplemental_budget_no' => $request->supplemental_budget_no,
                            'status' => $request->status]);

            $allot_act = Activity::where('activity_id', $request->activity_id);
            $allot_act->update(['total_allot_add' => $request->total_allot_add,
                            'appro_total_deduct'=> $request->appro_total_deduct,
                            'total_allot_adjust_balance' => $request->total_allot_adjust_balance,
                            'total_unallot_balance' => $request->total_unallot_balance]);

            $allot_exp = Expenses::where('expenses_id', $request->expenses_id);
            $allot_exp->update(['allot_add' => $request->allot_add,
                                'allot_deduct' => $request->allot_deduct,
                                'allot_adjust_balance' => $request->allot_adjust_balance,
                                'unallot_balance' => $request->unallot_balance]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

}
