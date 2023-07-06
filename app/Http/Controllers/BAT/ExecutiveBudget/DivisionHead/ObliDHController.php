<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExecObligationDetails;
use App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead\ObliDHController;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ObliReviewerController;

class ObliDHController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_obligation_list_for_approve')]);
    }

    public function view(Request $request){

        return (new ObliReviewerController)->view($request);
    }
    
    public function update(Request $request)
    {
        ExecObligationDetails::where('obli_id', $request->obli_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'FOR APPROVAL - CA',
                'remarks' => $request->remarks
            ]);;

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - CA.']);
    }

    public function reject(Request $request){

        return (new ObliDHController)->reject($request);
    }
}
