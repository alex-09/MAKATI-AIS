<?php

namespace App\Http\Controllers\TrustFunds;

use App\Http\Controllers\Controller;
use App\Models\LGUCounterpart;
use Illuminate\Http\Request;

class LGUCounterPartController extends Controller
{
    public function insertData(Request $request){
        try{


            $enrollAllot = LGUCounterpart::create([
           
                'general_descript'=>$request->gereral_descript,
                'legal_basis'=>$request->legal_basis,
                'journal_voucher_no'=>$request->journal_voucher_no,
                'journal_voucher_date'=>$request->journal_voucher_data,
                'main_fund_title'=>$request->main_fund_title,
                'sub_fund_title'=>$request->sub_fund_title,
                'specific_purpose'=>$request->specific_purpose,
                'amount_allocated'=>$request->amount_allocated,
                'implementing_office'=>$request->implementing_office,
                'remarks'=>$request->remarks
            ]);

        
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $enrollAllot
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
