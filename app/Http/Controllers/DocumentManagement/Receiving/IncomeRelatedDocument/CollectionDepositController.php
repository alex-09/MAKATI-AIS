<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DMCollectionDeposit;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CollectionDeposit;

class CollectionDepositController extends Controller
{
    public function insertCollectionDeposit(CollectionDeposit $request){
        try{

            $date = Carbon::now()->format('Y-m');

            $table = DMCollectionDeposit::all();
            if($table->isEmpty()){
                $transac_id = "RCD-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
            }else{
                $lastId = DMCollectionDeposit::latest('id')->select('id')->first();
                $ptId = $lastId['id'];
                $transac_id = "RCD-" . $date . "-" . str_pad(++$ptId, 7, '0', STR_PAD_LEFT);
            }
    
            // $docuFile = $transac_id.'.'.$request->file('document')->getClientOriginalExtension();
            // $request->document->move(public_path('uploads'), $docuFile);
    
            $collectiondeposit = DMCollectionDeposit::create([
                'incom_transaction_id_no' => $transac_id,
                // "document" => $docuFile
                ] + $request->validated());
        
            return response()->json([
                'status' => true,
                'message' => 'Your entry has been successfully saved under Transaction ID Number '.$transac_id,
                'data' => $collectiondeposit
            ]);
    
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
            }
}
