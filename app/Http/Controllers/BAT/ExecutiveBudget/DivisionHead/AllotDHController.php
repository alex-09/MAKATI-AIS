<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AllotDHController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM list_allotment')]);
    }

    public function view(Request $request){

        return (new AllotReviewerController)->view($request);
    }

    public function update(Request $request)
    {

        Allotment::where('allot_id', $request->allot_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'FOR APPROVAL - CA',
                // 'remarks' => $request->remarks
            ]);;


        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - CA.']);
    }

    public function reject(Request $request){

        return (new AllotReviewerController)->reject($request);
    }
}
