<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use App\Models\Activity;
use App\Models\Expenses;
use App\Models\Allotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\Executive\Processor\Allotment\EnrollAllotmentRepository;

class UpdateAllotmentController extends Controller
{
    private $enrollAllotRepo;

    public function __construct(EnrollAllotmentRepository $enrollAllotRepo)
    {
        return $this->enrollAllotRepo = $enrollAllotRepo;
    }

    public function department(Request $request){
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

    public function program(Request $request){
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

    public function project(Request $request){
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

    public function activity(Request $request){
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

    public function expense(Request $request){
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

    public function update(Request $request){
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
        }catch(\Throwable $th){
            return response()->json([
               'status' => false,
               'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
