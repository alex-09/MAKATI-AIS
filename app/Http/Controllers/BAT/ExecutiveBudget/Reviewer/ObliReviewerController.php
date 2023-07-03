<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExecObligationDetails;

class ObliReviewerController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('SELECT * FROM exec_obligation_list_for_approve')]);
    }

    public function view(Request $request){

        try{
            $main_data = DB::select('CALL exec_obligation_view_for_approval(?,?)',array(
                $request->obli_id,
                $request->cafoa
            ));

            $expense_data = DB::select('CALL exec_obligation_view_expense_for_approval(?,?)',array(
                $request->obli_id,
                $request->cafoa
            ));

            return response()->json([
                'status' => true,
                'main-info' => $main_data,
                'expenses' => $expense_data
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        ExecObligationDetails::where('obli_id', $request->obli_id)
            ->where('AIPCode', $request->aipcode)
            ->update([
                'status' => 'FOR APPROVAL - DH',
                'remarks' => $request->remarks
            ]);;

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - DH.']);
    }

    public function reject(Request $request)
    {

        $update = ExecObligationDetails::where('obli_id', $request->obli_id)
            ->where('AIPCode', $request->aipcode);

        $update->update([
            'status' => 'Rejected',
            'remarks' => $request->remarks
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);
    }
}
