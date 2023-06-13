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

        foreach ($request->fund_data as $fund) {
            $main_fund_form = $fund['main_fund_form'];
            foreach ($main_fund_form as $main) {
                $sub_fund_form = $main['sub_fund_form'];

                foreach ($sub_fund_form as $sub) {
                    tfFundDetails::create([
                        'tf_id' => $tfid,
                        'tr_type' => 4,
                        'main_fund_title' => $main["main_fund_title"],
                        'sub_fund_title' => $sub['sub_fund_title'],
                        'specific_purpose' => $sub['specific_purpose'],
                        'amount_allocated' => $sub['amount_allocated'],
                        'latest_balance' => $sub['amount_allocated'],
                        'implementing_office' => $sub['implementing_office']
                    ]);
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'lgu_id' => $tfid
        ]);
    }

    public function addSubFund($request){

        foreach ($request->fund_data as $fund) {
            $main_fund_form = $fund['main_fund_form'];
            foreach ($main_fund_form as $main) {
                $sub_fund_form = $main['sub_fund_form'];
    
                foreach ($sub_fund_form as $sub) {
                    tfFundDetails::create([
                        'tf_id' => $request->tfid,
                        'tr_type' => 4,
                        'main_fund_title' => $main["main_fund_title"],
                        'sub_fund_title' => $sub['sub_fund_title'],
                        'specific_purpose' => $sub['specific_purpose'],
                        'amount_allocated' => $sub['amount_allocated'],
                        'latest_balance' => $sub['amount_allocated'],
                        'implementing_office' => $sub['implementing_office']
                    ]);
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'lgu_id' => $request->tfid
        ]);
    }

    public function forReview($request){

        $updateStatus = tfFundDetails::where('tf_id', $request->tfid);
        $updateStatus->update(['status' => 'For Review']);

        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully added. The account has been subject for Review.'
        ]); 

    }
}