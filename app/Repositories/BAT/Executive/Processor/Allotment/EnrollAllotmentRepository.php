<?php

namespace App\Repositories\BAT\Executive\Processor\Allotment;

use App\Models\Allotment;
use App\Models\AllotmentDetails;
use App\Models\AllotmentExpenses;
use Illuminate\Support\Facades\DB;

class EnrollAllotmentRepository{

    public function department($request){
        try{

            $data = DB::select('call get_appro_department_allot(?,?)',array(
                $request->year,
                $request->fund_source
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

    public function approType($request){
        try{

            $data = DB::select('call get_appro_approtype_allot(?,?,?)',array(
                $request->year,
                $request->fund_source,
                $request->department
            ));

            return response()->json(['approType' => $data]);

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

            $data = DB::select('call get_appro_program_allot(?,?,?,?)',array(
                $request->year,
                $request->fund_source,
                $request->department,
                $request->appro_type
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

            $data = DB::select('call get_appro_project_allot(?,?)',array(
                $request->appro_id,
                $request->program
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

            $data = DB::select('call get_appro_activity_allot(?,?,?)',array(
                $request->appro_id,
                $request->program,
                $request->project
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

            $data1 = DB::select('call get_appro_activity_descrip_allot(?)',array(
                $request->appro_id
            ));

            $data2 = DB::select('call get_appro_expenses_allot(?,?)',array(
                $request->appro_id,
                $request->aipcode
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

    public function enroll($request){
        try{
            $getallot_id = Allotment::all();
            if($getallot_id->isEmpty()){
                $allot_id = "allot_"."1";
            }else{
                $getallot_id = Allotment::latest('id')->first();
                $allot_idInc = $getallot_id['id'];
                $allot_id = "allot_".++$allot_idInc;
            }

            foreach($request->program as $program){
                $project = $program['project'];
                foreach($project as $activity){
                    $expense = $activity['activity'];
                    foreach($expense as $expenses){
                        $expDetails = $expenses['expense'];
                            foreach($expDetails as $exp){

                            Allotment::create([
                                'appro_id' => $request->appro_id,
                                'allot_id' => $allot_id,
                                'budget_year_id' => $request->year,
                                'department_code_id' => $request->department,
                                'AIPCode' => $expenses['aipCode'],
                                'account_name' => $exp['accountCode'],
                                'account_code' => $exp['accountName'],
                                'appro_amount' => $exp['appropriation'],
                                'allot_amount' => $exp['allotment'],
                                'balance' => $exp['balance'],
                                'latest_balance' => $exp['balance']
                            ]);
                        }
                    }
                }
            }

            return response()->json([
                'status' => true,
                'message' => "Added Successfully!",
                'allot_id' => $allot_id,
                'aipcode' => $aipcode
            ]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function forReview($request){
        try{

            $data = Allotment::where('appro_id', $request->appro_id)->where('AIPCode', $request->aipcode)->update(['status' => "For Review"]);

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