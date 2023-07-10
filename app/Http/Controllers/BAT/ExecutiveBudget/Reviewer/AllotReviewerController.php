<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Reviewer;

use App\Models\Allotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AllotReviewerController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM list_allotment')]);
    }

    public function view(Request $request)
    {
        $mainInfo = DB::select('CALL get_allotment_report_main_info(?,?)',array(
            $request->aipcode,
            $request->allot_id
         ));

         $expenses = DB::select('call get_allotment_expense(?,?)',array(
            $request->aipcode,
            $request->allot_id
        ));

        return response()->json([
            'status' => true,
            'main_info' => $mainInfo,
            'expenses' => $expenses
        ]);
    }

    public function update(Request $request)
    {

        Allotment::where('allot_id', $request->allot_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'FOR APPROVAL - DH',
                'remarks' => $request->remarks
            ]);;
    

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - DH.']);
    }

    public function reject(Request $request)
    {

        $update = Allotment::where('allot_id', $request->allot_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
            'status' => 'Rejected',
            'remarks' => $request->remarks
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);
    }
}
