<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AppropriationDetails;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;

class ApproDHController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_list_appropriation')]);
    }

    public function view($id, $aipcode){

        return (new ApproReviewerController)->view($id, $aipcode);
    }

    public function update(Request $request)
    {

        $update = AppropriationDetails::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode);

        $update->update([
            'status' => 'FOR APPROVAL - CA',
            // 'remarks' => $request->remarks
        ]);

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - CA.']);
    }

    public function reject(Request $request){

        return (new ApproReviewerController)->reject($request);
    }
}
