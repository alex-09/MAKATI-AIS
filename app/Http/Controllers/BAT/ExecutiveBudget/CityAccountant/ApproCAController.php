<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AppropriationDetails;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;

class ApproCAController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_list_appropriation')]);
    }

    public function view($id, $aipcode){

        return (new ApproReviewerController)->view($id, $aipcode);
    }

    public function update(Request $request)
    {

        AppropriationDetails::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'Approved',
                // 'remarks' => $request->remarks
            ]);;

        AppropriationExpenses::where('appro_id', $request->appro_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'Approved'
            ]);

        return response()->json(['message' => 'The account has been successfully Approved.']);
    }

    public function reject(Request $request){

        return (new AllotReviewerController)->reject($request);
    }
}
