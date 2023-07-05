<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReportAppropriationContorller extends Controller
{
    public function reportAppro(Request $request){

        //ORIGINAL APPROPRIATION
        $original = DB::select('CALL exec_appro_update_original(?,?)',array(
            $request->aipcode,
            $request->appro_id
        ));

        $original_total = DB::select('CALL exec_appro_update_original_total(?,?)',array(
            $request->aipcode,
            $request->appro_id
        ));

        ////////////////////////////////////////////////////////////////////////////////

        $supplemental = DB::select('CALL exec_appro_update_report_supple(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                ));
        
        $supplemental_total = DB::select('CALL exec_appro_update_report_supple_total(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                ));
    
    
        ////////////////////////////////////////////////////////////////////////////////

        $realignment = DB::select('CALL exec_appro_update_report_realignment(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                ));

        $realignment_total = DB::select('CALL exec_appro_update_report_realignment_total(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                ));
        
        ////////////////////////////////////////////////////////////////////////////////

        $reversion = DB::select('CALL exec_appro_update_report_reversion(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                 ));

        $reversion_total = DB::select('CALL exec_appro_update_report_reversion_total(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                 ));

        ////////////////////////////////////////////////////////////////////////////////

        $mainInfo = DB::select('CALL exec_appro_update_report_info(?,?)',array(
                    $request->aipcode,
                    $request->appro_id
                 )); 

        ///////////////////////////////////////////////////////////////////////////////

        $final_appro = DB::select('CALL exec_appro_update_account_total(?,?)',array(
            $request->aipcode,
            $request->appro_id
         )); 
    
        return response()->json([
            'mainInfo' => $mainInfo,
            'original' => $original,
            'original_total' => $original_total,
            'supplemental' => $supplemental,
            'supplemental_total' => $supplemental_total,
            'realignment' => $realignment,
            'realignment_total' => $realignment_total,
            'reversion' => $reversion,
            'reversion_total' => $reversion_total,
            'final_appro' => $final_appro
        ]);
    }
}
