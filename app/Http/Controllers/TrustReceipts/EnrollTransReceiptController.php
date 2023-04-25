<?php

namespace App\Http\Controllers\TrustReceipts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferFromOtherGovernmentAgencies;
use Illuminate\Support\Facades\DB;

class EnrollTransReceiptController extends Controller
{
    public function srcTrustReceipt()
    {
        // Retrieve data from the database
        $list = DB::table('src_trust_receipt')
                    ->select('id', 'str_name')
                    ->get();
    
        // Convert the list to a JSON response
        return response()->json($list);
    }


    public function enrollNew(Request $request){
        try{

            $request->validate([
                'main_fund_id' => 'required',
                'sub_fund_id' => 'required',
                'government_type' => 'required',
                'agency_name' => 'required',
                'document_source' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'general_description' => 'required',
                'nadai_no' => 'required',
                'official_receipt_no' => 'required',
                'official_receipt_date' => 'required',
                'official_receipt_amount' => 'required',
                'nadai_date' => 'required',
                'main_fund_title' => 'required',
                'sub_fund_title' => 'required',
                'specific_purpose' => 'required',
                'amount_allocated' => 'required',
                'implementing_office' => 'required',
            ]);

            $enrollTransferGov = TransferFromOtherGovernmentAgencies::create([
                'main_fund_id' => $request->main_id,
                'sub_fund_id' => $request->sub_id,
                'government_type' => $request->gov_type,
                'agency_name' => $request->agen_name,
                'document_source' => $request->refdocu,
                'general_description' => $request->gen_desc,
                'nadai_no' => $request->nad_no,
                'official_receipt_no' => $request->offic_rec_no,
                'official_receipt_date' => $request->offic_rec_date,
                'official_receipt_amount' => $request->offic_rec_amount,
                'nadai_date' => $request->nad_date,
                'main_fund_title'  => $request->main_title,
                'sub_fund_title' => $request->sub_title,
                'specific_purpose' => $request->spec_purpose,
                'amount_allocated' => $request->amount_alloc,
                'implementing_office' => $request->implem_office

            ]);

            if ($image = $request->file('document_source')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['document_source'] = "$profileImage";
            }

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' =>  $enrollTransferGov
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