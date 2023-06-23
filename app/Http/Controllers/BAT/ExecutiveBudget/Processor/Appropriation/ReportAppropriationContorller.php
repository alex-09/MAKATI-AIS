<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportAppropriationContorller extends Controller
{
    public function reportAppro(Request $request){

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
    }
}
