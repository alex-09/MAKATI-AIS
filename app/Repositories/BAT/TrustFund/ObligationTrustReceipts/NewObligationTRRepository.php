<?php

namespace App\Repositories\BAT\TrustFund\ObligationTrustReceipts;

use App\Models\TfObigation;
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

        $enrollDonationPriv = TfObigation::create([
            'tf_ob_id' => $tf_ob_id,
        ] + $request->validated());

        TfObligationDetatils::create([
            'tf_ob_id' => $tf_ob_id,
        ] + $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' =>  $enrollDonationPriv
        ]);
    }
}