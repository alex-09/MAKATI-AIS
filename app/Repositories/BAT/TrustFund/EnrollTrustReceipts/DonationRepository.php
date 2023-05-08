<?php

namespace App\Repositories\BAT\TrustFund\EnrollTrustReceipts;

use App\Models\tfFundDetails;
use App\Models\DonationPrivateSector;

class DonationRepository{

    public function enroll($request){

        $tfoga = DonationPrivateSector::all();
        if($tfoga->isEmpty()){

            $tfid = "tf_dps_"."1";

        }else{
            $getId = DonationPrivateSector::latest('id')->first();
            $idinc = $getId['id'];
            $tfid = "tf_dps_".++$idinc;
        }

        $docuFile = time().'.'.$request->file('document_source')->getClientOriginalExtension();
        // $request->document->move(public_path('uploads'), $docuFile);

        $enrollDonationPriv = DonationPrivateSector::create([
            'tf_dps_id' => $tfid,
            'document_source' => $docuFile
        ] + $request->validated());

        tfFundDetails::create([
            'tf_id' => $tfid,
            'tr_type' => 2,
            'latest_balance' => $request->amount_allocated
        ] + $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' =>  $enrollDonationPriv
        ]);
    }
}