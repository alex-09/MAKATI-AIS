<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Obligation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdjustmentObligationController extends Controller
{
    public function getDepartment(Request $request)
    {
        try {

            $data = DB::select('call exec_obligation_get_department(?,?)', array(
                $request->year,
                $request->fund_source,
            ));

            return response()->json(['status' => true, 'department' => $data,]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getProgram(Request $request)
    {
        try {

            $data = DB::select('call exec_obligation_get_program(?,?,?)', array(
                $request->year,
                $request->fund_source,
                $request->department
            ));

            return response()->json(['status' => true, 'program' => $data,]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getProject(Request $request)
    {
        try {

            $data = DB::select('call exec_obligation_get_project(?,?)', array(
                $request->appro_id,
                $request->program,
            ));

            return response()->json(['status' => true, 'project' => $data,]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getActivity(Request $request)
    {
        try {

            $data = DB::select('call exec_obligation_get_activity(?,?,?)', array(
                $request->appro_id,
                $request->project
            ));

            return response()->json(['status' => true, 'acitivity' => $data,]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function getExpense(Request $request)
    {
        try {

            $data = DB::select('call exec_obligation_get_expense(?,?)', array(
                $request->appro_id,
                $request->aipcode
            ));

            return response()->json(['status' => true, 'expense' => $data,]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }
    

    public function adjustObligation(Request $request){
        try {

            $data = DB::select('call exec_adjust_obligation(?,?)', array(
                $request->year,
                $request->cafoa
            ));

            $data2 = DB::select('call exec_adjust_obligation_expense(?,?)', array(
                $request->year,
                $request->cafoa
            ));

            return response()->json([
                'status' => true, 
                'obliDetails' => $data,
                'obliExpense' => $data2
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }
}
