<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use App\Http\Controllers\Controller;
use App\Models\UnexpendedBalance;
use App\Models\File;
use Illuminate\Http\Request;

class UnexpendedController extends Controller
{
    public function insertData(Request $request){
        try{

        
            // $approId = "test";

            $unexpended = UnexpendedBalance::create([


                'main_fund_id'=>$request->main_fund_id,
                'sub_fund_id'=>$request->sub_fund_id,
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
