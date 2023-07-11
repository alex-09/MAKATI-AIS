<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\DivisionHead;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExecObligationDetails;
use App\Models\DMBudgetaryObligationsTransac;
use App\Http\Controllers\BAT\ExecutiveBudget\Reviewer\ObliReviewerController;

class ObliDHController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_obligation_list_for_approve')]);
    }

    public function view(Request $request){

        return (new ObliReviewerController)->view($request);
    }

    public function listBot(){
        return response()->json([
            'listProcessor' => DB::select('SELECT * FROM exec_obligation_list'),
            'listReviewer' => DB::select('SELECT * FROM list_reviewer_bot'),
            'processorLIst' => DB::select('SELECT * FROM list_processor_bot')
        ]);
    }

    public function assignOblig(Request $request){
        try {
            DMBudgetaryObligationsTransac::where('transaction_id', $request->transac_id)
            ->update([
                'transaction_type' => $request->transaction_type,
                'processer' => $request->processer,
                'reviewer' => $request->reviewer
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Success',
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
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

        return (new ObliReviewerController)->reject($request);
    }
}
