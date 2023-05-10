<?php

namespace App\Repositories\BAT\TrustFund\EnrollTrustReceipts;

use App\Models\tfFundDetails;
use App\Models\LGUCounterpart;

class LGURepository{

    public function enroll($request) {

        $tfoga = LGUCounterpart::all();
        if($tfoga->isEmpty()){
            $tfid = "tf_tlc_"."1";
        }else{
            $getId = LGUCounterpart::latest('id')->first();
            $idinc = $getId['id'];
            $tfid = "tf_tlc_".++$idinc;
        }

        $insertLGU = LGUCounterpart::create([
            'tf_id' => $tfid,
        ] + $request->validated());

        tfFundDetails::create([
            'tf_id' => $tfid,
            'tr_type' => 4,
            'latest_balance' => $request->amount_allocated
        ] + $request->validated());
    
        
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $insertLGU
        ]);
    }
}