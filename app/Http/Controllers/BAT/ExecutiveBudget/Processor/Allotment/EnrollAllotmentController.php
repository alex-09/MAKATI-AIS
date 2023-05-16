<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EnrollAllotmentController extends Controller
{
    public function fundsource(Request $request){
        try{

            $data = DB::select('call searchApproForAllot(?)',array($request->all()));
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

            $data = DB::select('call searchApproForAllot(?,?)',array($request->all()));
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

            $data = DB::select('call searchApproForAllot(?,?,?)',array($request->all()));
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

            $data = DB::select('call searchApproForAllot(?,?,?,?)',array($request->all()));
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

            $data = DB::select('call searchApproForAllot(?,?,?,?,?)',array($request->all()));
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

            $data = DB::select('call searchApproForAllot(?,?,?,?,?,?)',array($request->all()));
            return response()->json(['activity' => $data]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
