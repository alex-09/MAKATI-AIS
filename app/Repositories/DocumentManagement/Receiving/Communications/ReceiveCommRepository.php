<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Carbon\Carbon;
use App\Models\DmContractpo;
use App\Models\ReceiveCommunications;

class ReceiveCommRepository
{
    public function receive($request){

        $date = Carbon::now()->format('Y-M');

        $table = ReceiveCommunications::all();
        if($table->isEmpty()){
            $transac_id = "COM-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
        }else{
            $lastId = ReceiveCommunications::latest('id')->select('id')->first();
            $ptId = $lastId['id'];
            $transac_id = "COM-" . $date . "-" . str_pad(++$ptId, 7, '0', STR_PAD_LEFT);
        }

        $docuFile = time().'.'.$request->file('document')->getClientOriginalExtension();
        $request->document->move(public_path('uploads'), $docuFile);

        $insertRecCom = ReceiveCommunications::create([
            "transaction_id_num" => $transac_id,
            "document" => $docuFile
            ] + $request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Inserted Successfully',
            'data' => $insertRecCom
        ]);

    }
        
}