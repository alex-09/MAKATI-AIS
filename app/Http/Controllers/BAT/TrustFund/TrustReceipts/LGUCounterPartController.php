<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use Illuminate\Http\Request;
use App\Models\tfFundDetails;
use App\Models\LGUCounterpart;
use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\LGURequest;

class LGUCounterPartController extends Controller
{
    public function insertData(LGURequest $request){
        try{

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
                'remarks' => 1
            ] + $request->validated());

            tfFundDetails::create([
                'tf_id' => $tfid,
            ] + $request->validated());
        
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
