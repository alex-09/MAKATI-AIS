<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Reviewer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AppropriationDetails;

class ApproReviewerController extends Controller
{
    
    public function list(){

        return response()->json(['list' => DB::select('CALL get_appro_for_review()')]);
    }

    public function view($id, $aipcode)
    {
        $mainInfo = DB::select('CALL exec_appro_update_report_info(?,?)',array(
            $request->aipcode,
            $request->appro_id
         ));

         $expenses = DB::select('call exec_appro_getinfo(?,?)',array(
            $request->aipcode,
            $request->appro_id
        ));

        return response()->json([
            'status' => true,
            'main-info' => $mainInfo,
            'expenses' => $expenses
        ]);
    }

    public function update(Request $request)
    {

        $update = AppropriationDetails::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode);

        $update->update([
            'status' => 'FOR APPROVAL - DH',
            'remarks' => $request->remarks
        ]);
        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - DH.']);
    }

    public function reject(Request $request)
    {

        $update = AppropriationDetails::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode);

        $update->update([
            'status' => 'Rejected',
            // 'remarks' => $request->remarks
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);
    }
}
