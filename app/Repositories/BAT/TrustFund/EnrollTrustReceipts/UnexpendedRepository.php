<?php

namespace App\Repositories\BAT\TrustFund\EnrollTrustReceipts;

use App\Models\tfFundDetails;
use App\Models\UnexpendedBalance;

class UnexpendedRepository{

    public function enroll($request){

        $tfoga = UnexpendedBalance::all();
        if($tfoga->isEmpty()){
            $tfid = "tf_tub_"."1";
        }else{
            $getId = UnexpendedBalance::latest('id')->first();
            $idinc = $getId['id'];
            $tfid = "tf_tub_".++$idinc;
        }

        $docuFile = time().'.'.$request->file('document_source')->getClientOriginalExtension();
        // $request->document->move(public_path('uploads'), $docuFile);

        $unexpended = UnexpendedBalance::create([
            'tf_tub_id' => $tfid,
            'document_source' => $docuFile
        ] + $request->validated());

        tfFundDetails::create([
            'tf_id' => $tfid,
            'tr_type' => 3,
            'latest_balance' => $request->amount_allocated
        ] + $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'unexpended' => $unexpended,
        ]);
        
    }
}