<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Obligation;

use App\Models\Program;
use App\Models\BudgetYear;
use App\Models\Department;
use App\Models\Obligation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForProcessObligationController extends Controller
{
    public function store(Request $request){
        try{

            $getApproId = Obligation::all();
            if($getApproId->isEmpty()){
                $obli_id = "obli_"."1";
            }else{
                $getApproId = Obligation::latest('id')->first();
                $approIdInc = $getApproId['id'];
                $obli_id = "obli_".++$approIdInc;
            }

            Obligation::create([
                'obli_id' => $obli_id,
                'allot_id' => $request->allot_id,
                'appro_id' => $request->appro_id,
                'budget_year_id' => $request->budget_year_id,
                'transaction' => $request->transaction,
                'department' => $request->department,
                'fund_source' => $request->fund_source,
                'processing_slip_no' => $request->processing_slip_no,
                'cafoa_amount' => $request->cafoa_amount,
                'particulars' => $request->particulars,
                'purchase_req_no' => $request->purchase_req_no,
                'purchase_req_date' => $request->purchase_req_date,
                'payee' => $request->payee
            ]);

            ExecObligation::create([
                'obli_id' => $obli_id,
                'allot_id' => $request->allot_id,
                'AIPCode' => $request->aipcode,
                'account_title' => $request->account_title,
                'account_code' => $request->account_code,
                'appro_amount' => $request->appro_amount,
                'allot_amount' => $request->allot_amount,
                'obli_amount' => $request->obli_amount,
                'balance' => $request->balance,
                'latest_balance' => $request->latest_balance,
                'addition' => $request->addition,
                'deduction' => $request->deduction,
                'updated_balance' => $request->updated_balance,
                'status' => ""
            ]);

            return response()->json([
                'status' => true,
                'message' => "success",
                'obli_id' => $obli
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }
}
