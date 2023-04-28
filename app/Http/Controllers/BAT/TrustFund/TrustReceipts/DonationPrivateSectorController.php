<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use App\Http\Controllers\Controller;
use App\Models\DonationPrivateSector;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DonationPrivateSectorController extends Controller
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


    public function enrollDonate(Request $request){
        try{

            $request->validate([
                'company_name' => 'required',
                'main_fund_id' => 'required',
                'sub_fund_id' => 'required',
                'document_source' => 'required|mimes:pdf,doc,docx|max:2048',
                'general_description' => 'required',
                'official_receipt_no' => 'required',
                'official_receipt_date' => 'required',
                'main_fund_title' => 'required',
                'sub_fund_title' => 'required',
                'specific_purpose' => 'required',
                'amount_allocated' => 'required',
                'implementing_office' => 'required',
            ]);

            $enrollDonationPriv = DonationPrivateSector::create([
                'company_name' => $request->company_name,
                'main_fund_id' => $request->main_fund_id,
                'sub_fund_id' => $request->sub_fund_id,
                'document_source' => $request->document_source,
                'general_description' => $request->general_description,
                'official_receipt_no' => $request->official_receipt_no,
                'official_receipt_date' => $request->official_receipt_date,
                'main_fund_title'  => $request->main_fund_title,
                'sub_fund_title' => $request->sub_fund_title,
                'specific_purpose' => $request->specific_purpose,
                'amount_allocated' => $request->amount_allocated,
                'implementing_office' => $request->implementing_office

            ]);

            if ($request->hasFile('document_source')) {
                $file = $request->file('document_source');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/files', $filename);
                
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No file uploaded'
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' =>  $enrollDonationPriv
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
