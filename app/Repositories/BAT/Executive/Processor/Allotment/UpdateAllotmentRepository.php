<?php

namespace App\Repositories\BAT\Executive\Processor\Allotment;

use App\Models\Allotment;
use Illuminate\Support\Facades\DB;

class UpdateAllotmentRepository{

    public function department($request){
        try{

            $data = DB::select('call get_allotment_department(?,?)',array(
                $request->year,
                $request->appro_type
            ));

            return response()->json(['department' => $data]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function program($request){
        try{

            $data = DB::select('call get_allotment_program(?,?,?)',array(
                $request->year,
                $request->appro_type,
                $request->department,
            ));
            return response()->json(['program' => $data]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function project($request){
        try{

            $data = DB::select('call get_allotment_project(?,?)',array(
                $request->program,
                $request->allot_id
            ));
            return response()->json(['project' => $data]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function activity($request){
        try{

            $data = DB::select('call get_allotment_acitivity(?,?)',array(
                $request->project,
                $request->allot_id
            ));

            return response()->json(['activity' => $data]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function expense($request){
        try{

            $data2 = DB::select('call get_allotment_expense(?,?)',array(
                $request->aipcode,
                $request->allot_id
            ));

            return response()->json([
                'activity_descript' => $data2
        ]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update($request){
        try{

            $adjustment = Allotment::latest()->where('allot_id', $request->allot_id)->first();
            
            $adjustment = $adjustment->adjustemt_id;
            
                if($adjustment == null){
                    $adjst = "allot_adjst_1";
                }else{
                    $adjust = (int)substr($adjustment, 12, 20);
                    $adjst = "allot_adjst_".++$adjust;
                }

            foreach($request->expense as $expense){
                Allotment::create([
                    'appro_id' => $expense['appro_id'],
                    'allot_id' => $expense['allot_id'],
                    'AIPCode' => $expense['AIPCode'],
                    'type' => 'Update',
                    'adjustemt_id' => $adjst,
                    'budget_year_id' => $request->budget_year,
                    'department_code_id' => $expense['department_code_id'], 
                    'document_source' => $request->source_document, 
                    'date' => $request->date_of_document,
                    'adjustment_type' => $request->type_of_adjustment,
                    'adjustment_no' => $request->adjustment_number,
                    'account_code' => $expense['account_code'],
                    'account_name' => $expense['account_name'],
                    "appro_amount" => $expense['appro_amount'],
                    'balance' => $expense['balance'],
                    'addition' => $expense['addition'],
                    'deduction' => $expense['deduction'],
                    'allot_amount' => $expense['allot_amount'],
                    'adjusted_balance' => $expense['adjusted_balance'],
                    'unalloted_balance' => $expense['unalloted_balance'],
                ]); 
            }

            return response()->json([
                'status' => true,
                'message' => 'success',
                'aipcode' => $request->aipcode,
                'allot_id' => $request->allot_id,
                'adjustment_id' => $adjst
            ]);

        }catch(\Throwable $th){
            return response()->json([
               'status' => false,
               'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }


    public function forReview($request){
        try{

            $data = Allotment::where('adjustment_id', $request->adjustment_id)
            ->update([
                'type' => 'Update',
                'status' => "For Review"
            ]);

            return response()->json([
               'status' => true,
               'message' => "Success",
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