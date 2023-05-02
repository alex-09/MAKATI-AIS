<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use Illuminate\Http\Request;
use App\Models\tfFundDetails;
use App\Models\LGUCounterpart;
use App\Http\Controllers\Controller;

class LGUCounterPartController extends Controller
{
    public function insertData(Request $request){
        try{

            $request->validate([
                'general_descript' => 'required',
                'legal_basis' => 'required',
                'main_fund_title' => 'required',
                'sub_fund_title' => 'required',
                'specific_purpose' => 'required',
                'amount_allocated' => 'required',
                'implementing_office' => 'required',
            ]);

            $tfoga = LGUCounterpart::all();
            if($tfoga->isEmpty()){
                $tfid = "tf_tlc_"."1";
            }else{
                $getId = LGUCounterpart::latest('id')->first();
                $idinc = $getId['id'];
                $tfid = "tf_tlc_".++$idinc;
            }

            $insertLGU = LGUCounterpart::create([
                'tf_tlc_id' => $tfid,
                'general_descript' => $request->general_descript,
                'legal_basis' => $request->legal_basis,
                'remarks' => 1
            ]);

            tfFundDetails::create([
                'tf_id' => $tfid,
                'main_fund_title'  => $request->main_fund_title,
                'sub_fund_title' => $request->sub_fund_title,
                'specific_purpose' => $request->specific_purpose,
                'amount_allocated' => $request->amount_allocated,
                'implementing_office' => $request->implementing_office
            ]);
        
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $insertLGU
            ]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
