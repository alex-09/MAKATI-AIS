<?php

namespace App\Repositories\BAT\TrustFund\ObligationTrustReceipts;

use App\Models\TfObigation;
use App\Models\TfObligationDetatils;

class NewObligationTRRepository{

    public function store($request){

        dd($request);
        $tfobli = TfObigation::all();
        if($tfobli->isEmpty()){

            $tf_ob_id = "tf_ob_"."1";

        }else{
            $getId = TfObigation::latest('id')->first();
            $idinc = $getId['id'];
            $tf_ob_id = "tf_ob_".++$idinc;
        }

        $enrollDonationPriv = TfObigation::create([
            'tf_obli_id' => $tf_ob_id,
        ] + $request->validated());

        TfObligationDetatils::create([
            'tf_obli_id' => $tf_ob_id,
            // 'src_of_tf' => $request->src_of_tf,
            // 'main_fund_title' => $request->main_fund_title,
            // 'company' => $request->company,
            // 'sub_fund_title' => $request->sub_fund_title,
            // 'latest_bal_tf' => $request->latest_bal_tf,
            // 'account_title' => $request->account_title,
            // 'account_code' => $request->account_code,
            // 'amount_obligated' => $request->amount_obligated,
            // 'balance' => $request->balance,
            // 'remarks' => $request->remarks,
        ] + $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' =>  $enrollDonationPriv
        ]);
    }
}