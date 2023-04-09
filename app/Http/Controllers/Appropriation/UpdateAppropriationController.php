<?php

namespace App\Http\Controllers\Appropriation;

use App\Models\Activity;
use App\Models\Expenses;
use Illuminate\Http\Request;
use App\Models\Appropriation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UpdateAppropriationController extends Controller
{
    // FILTER APPROPRIATION FOR UPDATE
    public function FilterAppropriation(Request $request){

            try{

                $request->validate([
                    'budyear' => 'required',
                    'fundSource' => 'required',
                    'dept_code' => 'required',
                    'refdocu' => 'required',
                    'prog_code' => 'required',
                    'proj_code' => 'required',
                    'act_code' => 'required'
                ]);
                
                $data = DB::select('call searchAppro(?,?,?,?,?,?,?)',array(
                    $request->budyear,
                    $request->fundSource,
                    $request->dept_code,
                    $request->refdocu,
                    $request->prog_code,
                    $request->proj_code,
                    $request->act_code));
    
                return response()->json([
    
                    'status' => true,
                    'message' => 'Successfully fetch',
                    'data' => $data,
    
    
                ]);
    
            } catch(\Throwable $th){
    
                return response()->json([
    
                    'status' => false,
                    'message' => "Something went wrong!",
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
            
            ]);
            
            // INSERT DATA IN EXPENSES TABLE
            $enrollExpenses = Expenses::create([
            
                'appro_id' => $request->approId,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code,
                'activity_code_id' => $request->activity_code,
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'appropriation_amount' => $request->appropriation_amount,
            
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

    public function updateAppro(Request $request){
        
        try{
            
            $request->validate([
                'supp_budget_num' => 'required',
                'adjustment_type' => 'required'
            ]);

            $approRef = Appropriation::where('appro_id', $request->approId);
            
            $approRef->update([
                'supp_budget_num' => $request->supp_budget_num,
                'adjustment_type' => $request->adjustment_type,
            ]);

            $expRef = Expenses::where('appro_id', $request->approId)
                            ->where('account_code', $request->acc_code);

            $expRef->update([
                'addition' => $request->add,
                'deduction' => $request->deduct
            ]);

            $actRef = Activity::where('appro_id', $request->approId)
                            ->where('activity_code', $request->act_code);

            $updateTotal = $actRef->update([
                'total_exp_amount' => $request->total_exp,
                'total_addition' => $request->total_add,
                'total_deduction' => $request->total_deduct
            ]);

            return response()->json([

                'status' => true,
                'message' => 'Success!',
                'data' => $updateTotal

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
