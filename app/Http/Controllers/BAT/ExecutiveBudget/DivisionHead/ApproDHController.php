<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;

class ApproDHController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_list_appropriation')]);
    }

    public function view(Request $request){

        $mainInfo = DB::select('CALL exec_appro_update_report_info(?,?)',array(
            $request->aipcode,
            $request->appro_id
         ));

         $expenses = DB::select('call exec_appro_getinfo_fordivhead(?,?)',array(
            $request->aipcode,
            $request->appro_id
        ));

        return response()->json([
            'status' => true,
            'main_info' => $mainInfo,
            'expenses' => $expenses
        ]);

    }

    public function update(Request $request)
    {

        AppropriationDetails::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'FOR APPROVAL - CA',
                'remarks' => $request->remarks
            ]);;

        AppropriationExpenses::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'FOR APPROVAL - CA'
            ]);



        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - CA.']);
    }

    public function reject(Request $request){

        return (new ApproReviewerController)->reject($request);
    }
}
