<?php

namespace App\Repositories\BAT\Executive\Processor\Allotment;

use App\Models\Allotment;
use App\Models\AllotmentDetails;
use App\Models\AllotmentExpenses;

class EnrollAllotmentRepository{

    public function enroll($request){

        $getallotId = Allotment::all();
        if($getallotId->isEmpty()){
            $allot_id = "allot_"."1";
        }else{
            $getallotId = Allotment::latest('id')->first();
            $allotIdInc = $getallotId['id'];
            $allot_id = "allot_".++$allotIdInc;
        }

        $aipcode = $request->program_code."-".$request->project_code."-".$request->activity_code;

        Allotment::Create([
            'allot_id' => $allot_id,
        ] + $request->validated());

        AllotmentDetails::create([
            'allot_id' => $allot_id,
            'AIPCode' => $aipcode,
            'latest_allot_total' => $request->allot_total
            ] + $request->validated()
        );

        for($i=0; $i<count($request->account_code); $i++){
        AllotmentExpenses::create([
            'appro_id' => $request->appro_id,
            'allot_id' => $allot_id,
            'AIPCode' => $aipcode,
            'latest_balance' => $request->balance[$i],
            'account_code' => $request->account_code[$i],
            'account_name' => $request->account_name[$i],
            'appro_amount' => $request->appro_amount[$i],
            'allot_amount' => $request->allot_amount[$i],
            'balance' => $request->balance[$i]
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => "Added Successfully!",
            'allot_id' => $allot_id,
            'aipcode' => $aipcode
        ]);
    }
}