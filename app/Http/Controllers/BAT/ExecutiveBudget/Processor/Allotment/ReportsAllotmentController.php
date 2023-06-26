<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsAllotmentController extends Controller
{
    public function reports(Request $request){
        try {
            
            $supplemental = DB::select('CALL get_allotment_report_supplemental(?,?)',array(
                        $request->aipcode,
                        $request->allot_id
                    ));

            $realignment = DB::select('CALL get_allotment_report_realign(?,?)',array(
                        $request->aipcode,
                        $request->allot_id
                    ));

            $reversion = DB::select('CALL get_allotment_report_riversion(?,?)',array(
                        $request->aipcode,
                        $request->allot_id
                    ));

            $mainInfo = DB::select('CALL get_allotment_report_main_info(?,?)',array(
                        $request->aipcode,
                        $request->allot_id
                    ));

            $totalAdjustment = DB::select('CALL get_allotment_reports_total_adjustment(?,?)',array(
                        $request->aipcode,
                        $request->allot_id
                    ));

            return response()->json([
                'mainInfo' => $mainInfo,
                'supplemental' => $supplemental,
                'realignment' => $realignment,
                'mainInfo' => $mainInfo,
                'totalAdjustment' => $totalAdjustment
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
                
            ]);
        }
    }   
}
