<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use Illuminate\Http\Request;
use App\Models\tfFundDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TransferFromOtherGovernmentAgencies;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\TRRequest;

class EnrollTransReceiptController extends Controller
{
    public function srcTrustReceipt()
    {
        $list = DB::table('src_trust_receipt')
                    ->select('id', 'str_name')
                    ->get();

        return response()->json($list);
    }


    public function enrollNew(TRRequest $request){
        try{

            $tfoga = TransferFromOtherGovernmentAgencies::all();
            if($tfoga->isEmpty()){
                $tfid = "tf_toga_"."1";
            }else{
                $getId = TransferFromOtherGovernmentAgencies::latest('id')->first();
                $idinc = $getId['id'];
                $tfid = "tf_toga_".++$idinc;
            }

            $enrollTransferGov = TransferFromOtherGovernmentAgencies::create([
                'tf_toga_id' => $tfid,
                'remarks' => 1,
            ] + $request->validated());

            tfFundDetails::create([
                'tf_id' => $tfid,
                'tr_type' => 1
            ] + $request->validated());

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