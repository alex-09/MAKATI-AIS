<?php

namespace App\Repositories\BAT\TrustFund\EnrollTrustReceipts;

use App\Models\tfFundDetails;
use App\Models\TransferFromOtherGovernmentAgencies;

class TransferRepository{

    public function enroll($request){
        $tfoga = TransferFromOtherGovernmentAgencies::all();
        if($tfoga->isEmpty()){
            $tfid = "tf_toga_"."1";
        }else{
            $getId = TransferFromOtherGovernmentAgencies::latest('id')->first();
            $idinc = $getId['id'];
            $tfid = "tf_toga_".++$idinc;
        }

        $docuFile = time().'.'.$request->file('document_source')->getClientOriginalExtension();
        // $request->document->move(public_path('uploads'), $docuFile);

        $enrollTransferGov = TransferFromOtherGovernmentAgencies::create([
            'tf_id' => $tfid,
            'document_source' => $docuFile
        ] + $request->validated());

        tfFundDetails::create([
            'tf_id' => $tfid,
            'tr_type' => 1,
            'latest_balance' => $request->amount_allocated
        ] + $request->validated());


        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' =>  $enrollTransferGov
        ]);
    }
}