<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ApproReviewerController;

class ApproCAController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_list_appropriation')]);
    }

    public function view(Request $request){

        $mainInfo = DB::select('CALL exec_appro_update_report_info(?,?)',array(
            $request->aipcode,
            $request->appro_id
         ));

         $expenses = DB::select('call exec_appro_getinfo_forcityaccount(?,?)',array(
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
        Appropriation::where('appro_id', $request->appro_id)
        ->where('AIPCode', $request->aipcode)
        ->update([
            'status' => 'Approved',
            'remarks' => $request->remarks
        ]);

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

        return (new ApproReviewerController)->reject($request);
    }
}
