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
                'activity' => $data1,
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
                    $adjst = ++$adjust;
                }

                Allotment::where('allot_id', $request->appro_id)->update(['type' => "Update"]);

            foreach($request->details_form as $details){
                    $expenses = $details['expense'];
                foreach($expenses as $expense_details){
                    Allotment::create([
                        'appro_id' => $expense_details['appro_id'],
                        'allot_id' => $expense_details['appro_id'],
                        'AIPCode' => $expense_details['AIPCode'],
                        'adjustemt_id' => "adjst_".$adjst,
                        'budget_year_id' => $request->year,
                        'department_code_id' => $request->department, 
                        'document_source' => $request->source_document, 
                        'date' => $request->date_of_document,
                        'adjustment_type' => $request->type_of_adjustment,
                        'adjustment_no' => $request->adjustment_no,
                        'account_code' => $expense_details['account_code'],
                        'account_name' => $expense_details['account_name'],
                        'balance' => $request->balance,
                        'addition' => $expense_details['addition'],
                        'deduction' => $expense_details['deduction'],
                        'adjusted_balance' => $request->adjusted_balance,
                        'unalloted_balance' => $request->unalloted_balance,
                    ]);

                    }
            }
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

            $data = Allotment::where('allot_id', $request->allot_id)
            ->where('AIPCode', $request->aipcode)
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