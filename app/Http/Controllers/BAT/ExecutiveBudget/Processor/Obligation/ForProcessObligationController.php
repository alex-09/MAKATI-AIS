<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Obligation;

use App\Models\Program;
use App\Models\BudgetYear;
use App\Models\Department;
use App\Models\Obligation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExecObligationDetails;
use App\Models\DMBudgetaryObligationsTransac;

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

            foreach($request->obligation as $obligation){

                Obligation::create([
                    'obli_id' => $obli_id,
                    'allot_id' => $obligation['allot_id'],
                    'appro_id' => $obligation['appro_id'],
                    'budget_year_id' => $obligation['budget_year_id'],
                    'transaction' => $obligation['transaction'],
                    'department' => $obligation['department'],
                    'fund_source' => $obligation['fund_source'],
                    'processing_slip_no' => $obligation['processing_slip_no'],
                    'cafoa_amount' => $obligation['cafoa_amount'],
                    'particulars' => $obligation['particulars'],
                    'purchase_req_no' => $obligation['purchase_req_no'],
                    'purchase_req_date' => $obligation['purchase_req_date'],
                    'payee' => $obligation['payee']
                ]);

                $obli_main = $obligation['details'];
                foreach($obli_main as $obli_expense){

                        ExecObligationDetails::create([
                            'obli_id' => $obli_id,
                            'allot_id' => $obligation['allot_id'],
                            'AIPCode' => $obli_expense['aipcode'],
                            'account_title' => $obli_expense['account_title'],
                            'account_code' => $obli_expense['account_code'],
                            'appro_amount' => $obli_expense['appro_amount'],
                            'allot_amount' => $obli_expense['allot_amount'],
                            'obli_amount' => $obli_expense['obli_amount'],
                            'balance' => $obli_expense['balance'],
                            'latest_balance' => $obli_expense['balance'],
                        ]);
                    }
                }

            DMBudgetaryObligationsTransac::where('transaction_id', $request->transaction_id)
            ->update(['cafoa_id' => $obli_id]);

            return response()->json([
                'status' => true,
                'message' => "success",
                'obli_id' => $obli_id
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
