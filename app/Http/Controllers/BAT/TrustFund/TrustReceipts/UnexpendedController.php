<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\tfFundDetails;
use App\Models\UnexpendedBalance;
use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\UnexpendedRequest;

class UnexpendedController extends Controller
{
    public function insertData(UnexpendedRequest $request){
        try{

            $tfoga = UnexpendedBalance::all();
            if($tfoga->isEmpty()){
                $tfid = "tf_tub_"."1";
            }else{
                $getId = UnexpendedBalance::latest('id')->first();
                $idinc = $getId['id'];
                $tfid = "tf_tub_".++$idinc;
            }

            $unexpended = UnexpendedBalance::create([
                'tf_tub_id' => $tfid,
                'remarks' => 1
            ] + $request->validated());

            tfFundDetails::create([
                'tf_id' => $tfid,
            ] + $request->validated());

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'unexpended' => $unexpended,
               
            ]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function upload(Request $request)
    {
 
    
       $upload = new UnexpendedBalance();

       $upload->file = $request->file->hashName();

       $result = $upload->save();
       if($result){

        return response()->json([

            'result' => 'File Added'
        ]);

       }else{
        return response()->json([
            'result' => 'File Not Added'
        ]);
       }

    }
}
