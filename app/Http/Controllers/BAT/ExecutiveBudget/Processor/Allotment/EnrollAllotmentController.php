<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\Executive\Allotment\AllotmentRequest;
use App\Repositories\BAT\Executive\Processor\Allotment\EnrollAllotmentRepository;

class EnrollAllotmentController extends Controller
{
    private $enrollAllotRepo;

    public function __construct(EnrollAllotmentRepository $enrollAllotRepo)
    {
        return $this->enrollAllotRepo = $enrollAllotRepo;
    }

    public function department(Request $request){
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

    public function approType(Request $request){
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

    public function program(Request $request){
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

    public function project(Request $request){
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

    public function activity(Request $request){
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

    public function expense(Request $request){
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

    public function enroll(AllotmentRequest $request){
        try{
            return $this->enrollAllotRepo->enroll($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
