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

        $getallotId = Allotment::all();
        if($getallotId->isEmpty()){
            $allot_id = "allot_"."1";
        }else{
            $getallotId = Allotment::latest('id')->first();
            $allotIdInc = $getallotId['id'];
            $allot_id = "allot_".++$allotIdInc;
        }

        $aipcode = $request->program_code."-".$request->project_code."-".$request->activity_code;

        Allotment::Create([
            'allot_id' => $allot_id,
            'appro_id' => $allot_id,
            'budget_year_id' => $allot_id,
            'department_code_id' => $allot_id,
            'AIPCode' => $allot_id,
            'account_name' => $allot_id,
            'account_code' => $allot_id,
            'appro_amount'=> $allot_id,
            'allot_amount'=> $allot_id,
            'balance' =>$allot_id,
            'latest_balance' => $allot_id,
        ]);
;
        return response()->json([
            'status' => true,
            'message' => "Added Successfully!",
            'allot_id' => $allot_id,
            'aipcode' => $aipcode
        ]);
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