<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Obligation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportObligationController extends Controller
{
    public function Report(Request $request){
        try{
            $data1 = DB::select('call exec_obligation_report_1(?,?)', array(
                $request->year,
                $request->cafoa
            ));
            $data2 = DB::select('call exec_obligation_report_2(?,?)', array(
                $request->year,
                $request->cafoa
            ));
            $data3 = DB::select('call exec_obligation_report_4(?,?)', array(
                $request->year,
                $request->cafoa
            ));
            
            $data3 = DB::select('call exec_obligation_report_3(?,?)', array(
                $request->year,
                $request->cafoa
            ));
            

            return response()->json([
                'status' => true,
                'message' => "success",
                'final_appro_allot' => $data1,
                'obligation' => $data2,
                'unutilize_appro_allot' => $data3
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }
}
