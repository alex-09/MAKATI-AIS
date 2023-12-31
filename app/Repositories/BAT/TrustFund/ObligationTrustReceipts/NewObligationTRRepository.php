<?php

namespace App\Repositories\BAT\TrustFund\ObligationTrustReceipts;

use App\Models\DMBudgetaryObligationsTransac;
use App\Models\TfObigation;
use Illuminate\Support\Facades\DB;
use App\Models\TfObligationDetatils;

class NewObligationTRRepository{

    public function store($request){

        $tfobli = TfObigation::all();
        if($tfobli->isEmpty()){

            $tf_ob_id = "tf_ob_"."1";

        }else{
            $getId = TfObigation::latest('id')->first();
            $idinc = $getId['id'];
            $tf_ob_id = "tf_ob_".++$idinc;
        }

        TfObigation::create([
            'tf_obli_id' => $tf_ob_id,
            'processer' => "Name of Account Logged in"
        ] + $request->validated());

        $updatebot = DMBudgetaryObligationsTransac::where('transaction_id', $request->transac_id);
        $updatebot->update([
            'description' => $request->particulars,
            'status' => "For Review",
            'processer' => "Name of Account Logged in",
            'furs_id' => $tf_ob_id
        ]);

        for($i=0; $i<count($request->main_fund_title); $i++){
            for($x=0; $x<count($request->account_title); $x++){
            TfObligationDetatils::create([
                'tf_obli_id' => $tf_ob_id,
                'src_of_tf' => $request->src_of_tf[$i],
                'main_fund_title' => $request->main_fund_title[$i],
                'company' => $request->company[$i],
                'sub_fund_title' => $request->sub_fund_title[$i],
                'latest_bal_tf' => $request->latest_bal_tf[$i],
                'tf_count_id' => 'counter_'.$x,
                'account_title' => $request->account_title[$x],
                'account_code' => $request->account_code[$x],
                'amount_obligated' => $request->amount_obligated[$x],
                'latest_balance' => $request->amount_obligated[$x],
                'balance' => $request->balance[$x],
                'remarks' => $request->remarks[$x],
            ]);
        }
        }

        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully added. The account has been subject for Review.',
        ]);
    }
}