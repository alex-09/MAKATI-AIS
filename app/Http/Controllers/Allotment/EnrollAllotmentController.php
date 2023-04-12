<?php

namespace App\Http\Controllers\Allotment;

use App\Models\Activity;
use App\Models\Expenses;
use App\Models\Allotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EnrollAllotmentController extends Controller
{
    public function filterAllot(Request $request){
        try{
            $request->validate([
                'budyear' => 'required',
                'fundSource' => 'required',
                'refdocu' => 'required',
                'prog_code' => 'required',
                'proj_code' => 'required',
                'act_code' => 'required'
            ]);
            
            $data = DB::select('call searchApproForAllot(?,?,?,?,?,?)',array(
                $request->budyear,
                $request->fundSource,
                $request->refdocu,
                $request->prog_code,
                $request->proj_code,
                $request->act_code));

            return response()->json([
                'status' => true,
                'message' => 'Successfully fetch',
                'data' => $data,
            ]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function enrollAllotment(Request $request){
        try{

            $getAllotId = Allotment::latest('id')->first();

            $allotIdInc = $getAllotId['id'];

            $allotId = "ALLOT_".$allotIdInc;

            // $approId = "test";

            $enrollAllot = Allotment::create([
                'allot_id' => $allotId,
                'budget_year_id' => $request->budyear,
                'fund_source' => $request->fundSource,
                'appropriation_type'=> $request->appro_type,
                'document_source' => $request->refdocu,
                'program_code_id' => $request->prog_code,
                'project_code_id' => $request->proj_code,
                'activity_code_id' => $request->act_code
            ]);

            $exp = Expenses::where('appro_id', $request->approId)
                            ->where('account_code', $request->acc_code);

            $exp->update([
                'allot_amount' => $request->allot_amount,
                'balance' => $request->bal,
                'allot_id' => $allotId ]);
                

            $act = Activity::where('appro_id', $request->approId)
                            ->where('activity_code', $request->act_code);

            $act->update([
                    'allot_total' => $request->allot_total,
                    'balance' => $request->bal]);

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $enrollAllot
            ]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    // number_format("1000000",2)."<br>";
    public function addActivity(Request $request){
         
        try{
    
            // INSERT DATA IN ACTIVITY TABLE
            $enrollActivity = Activity::create([
    
                'appro_id' => $request->approId,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code,
                'activity' => $request->activity,
                'activity_code' => $request->activity_code,
                'activity_description' => $request->activity_description,
                'appro_total' => $request->appro_total,
                'allot_total' => $request->allot_total,
                'balance' => $request->bal
                
            ]);
                
                // INSERT DATA IN EXPENSES TABLE
            $enrollExpenses = Expenses::create([
                
                'appro_id' => $request->approId,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code,
                'activity_code_id' => $request->activity_code,
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'appro_amount' => $request->appropriation_amount,
                'allot_amount' => $request->allot_amount,
                'balance' => $request->bal,
                
            ]);
    
            return response()->json([
    
                'status' => true,
                'message' => "Insert data success!",
                'Activity' => $enrollActivity,
                'Expenses' => $enrollExpenses,
    
            ]);
    
        }catch(\Throwable $th){
                
            return response()->json([
                'status' => false,
                'message' => "Something Went Wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }
}
