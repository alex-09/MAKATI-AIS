<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use Illuminate\Http\Request;
use App\Models\tfFundDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DonationPrivateSector;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\DPSRequest;

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

    public function enrollDonate(DPSRequest $request){
        try{

            $tfoga = DonationPrivateSector::all();
            if($tfoga->isEmpty()){
                $tfid = "tf_dps_"."1";
            }else{
                $getId = DonationPrivateSector::latest('id')->first();
                $idinc = $getId['id'];
                $tfid = "tf_dps_".++$idinc;
            }

            $enrollDonationPriv = DonationPrivateSector::create([
                'tf_dps_id' => $tfid,
                'remarks' => 1,
            ] + $request->validated());

            tfFundDetails::create([
                'tf_id' => $tfid,
                'tr_type' => 2
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
