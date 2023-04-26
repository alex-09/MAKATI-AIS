<?php

namespace App\Http\Controllers\TrustFunds;

use App\Http\Controllers\Controller;
use App\Models\UnexpendedBalance;
use Illuminate\Http\Request;

class UnexpendedController extends Controller
{
    public function insertData(Request $request){
        try{

        
            // $approId = "test";

            $unexpended = UnexpendedBalance::create([


                'budget_year_id'=>$request->budget_year,
                'document_source'=>$request->docu_source,
                'general_descript'=>$request->general_descript,
                'legal_basis'=>$request->legal_basis,
                'journal_voucher_no'=>$request->journal_voucher_no,
                'journal_voucher_date'=>$request->journal_voucher_date,
                'main_fund_title'=>$request->main_fund_title,
                'sub_fund_title'=>$request->sub_fund_title,
                'specific_purpose'=>$request->specific_purpose,
                'amount_allocated'=>$request->amount_allocated,
                'implementing_office'=>$request->implementing_office,
                'remarks'=>$request->remarks
            ]);
            $unexpended->save();

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $unexpended
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