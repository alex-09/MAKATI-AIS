<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsAllotmentController extends Controller
{
    public function reports(Request $request){
        try {
            
            $supplemental = DB::select('CALL exec_appro_update_report_supple(?,?)',array(
                $request->aipcode,
                $request->appro_id
            ));

            $realignment = DB::select('CALL exec_appro_update_report_realignment(?,?)',array(
                        $request->aipcode,
                        $request->appro_id
                    ));

            $reversion = DB::select('CALL exec_appro_update_report_reversion(?,?)',array(
                        $request->aipcode,
                        $request->appro_id
                    ));

            $mainInfo = DB::select('CALL exec_appro_update_report_info(?,?)',array(
                        $request->aipcode,
                        $request->appro_id
                    ));

            return response()->json([
                'mainInfo' => $mainInfo,
                'supplemental' => $supplemental,
                'realignment' => $realignment,
                'mainInfo' => $mainInfo
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
