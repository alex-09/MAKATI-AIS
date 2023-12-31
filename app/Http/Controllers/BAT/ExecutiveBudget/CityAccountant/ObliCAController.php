<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExecObligationDetails;
use App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead\ObliDHController;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ObliReviewerController;

class ObliCAController extends Controller
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
                'status' => 'Approved',
                'remarks' => $request->remarks
            ]);;

        return response()->json(['message' => 'This entry has been successfully Approved']);
    }

    public function reject(Request $request){

        return (new ObliReviewerController)->reject($request);
    }
}
