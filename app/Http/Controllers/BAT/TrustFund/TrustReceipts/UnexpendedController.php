<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\tfFundDetails;
use App\Models\UnexpendedBalance;
use App\Http\Controllers\Controller;

class UnexpendedController extends Controller
{
    public function insertData(Request $request){
        try{

            $request->validate([
                'budget_year_id' => 'required',
                'general_descript' => 'required',
                'document_source' => 'required|mimes:pdf,doc,docx|max:2048',
                'legal_basis' => 'required',
                'journal_voucher_no' => 'required',
                'journal_voucher_date' => 'required',
                'main_fund_title' => 'required',
                'sub_fund_title' => 'required',
                'specific_purpose' => 'required',
                'amount_allocated' => 'required',
                'implementing_office' => 'required',
            ]);

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
                'budget_year_id' => $request->budget_year_id,
                'document_source' => $request->document_source,
                'legal_basis' => $request->legal_basis,
                'general_descript' => $request->general_descript,
                'journal_voucher_no' => $request->journal_voucher_no,
                'journal_voucher_date' => $request->journal_voucher_date,
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
