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
            'tf_id' => $tfid,
            'document_source' => $docuFile
        ] + $request->validated());

        for($i=0; $i<count($request->main_fund_title); $i++){
            for($x=0; $x<count($request->sub_fund_title); $x++){
                tfFundDetails::create([
                    'tf_id' => $tfid,
                    'tr_type' => 2,
                    'main_fund_title' => $request->main_fund_title[$i],
                    'sub_fund_title' => $request->sub_fund_title[$x],
                    'specific_purpose' => $request->specific_purpose[$x],
                    'amount_allocated' => $request->amount_allocated[$x],
                    'latest_balance' => $request->amount_allocated[$x],
                    'implementing_office' => $request->implementing_office[$x]
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' =>  $enrollDonationPriv
        ]);
    }
}