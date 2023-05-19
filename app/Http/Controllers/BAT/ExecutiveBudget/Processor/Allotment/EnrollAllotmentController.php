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

    public function fundsource(Request $request){
        try{

            $data = DB::select('call get_appro_fundsource_allot(?)',array($request->all()));
            return response()->json(['fundsource' => $data]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function department(Request $request){
        try{

            $data = DB::select('call get_appro_department_allot(?,?)',array($request->all()));
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

            $data = DB::select('call get_appro_approtype_allot(?,?,?)',array($request->all()));
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

            $data = DB::select('call get_appro_program_allot(?,?,?,?)',array($request->all()));
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

            $data = DB::select('call get_appro_project_allot(?,?,?,?,?)',array($request->all()));
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

            $data = DB::select('call get_appro_activity_allot(?,?,?,?,?,?)',array($request->all()));
            return response()->json(['activity' => $data]);

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
