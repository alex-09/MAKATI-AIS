<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Carbon\Carbon;
use App\Models\ActionHistory;
use App\Models\ReceiveCommunications;

class ReceiveCommRepository
{
    public function receive($request){

        $date = Carbon::now()->format('Y-m');

        $table = ReceiveCommunications::all();
        if($table->isEmpty()){
            $transac_id = "COM-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
        }else{
            $lastId = ReceiveCommunications::latest('id')->select('id')->first();
            $ptId = $lastId['id'];
            $transac_id = "COM-" . $date . "-" . str_pad(++$ptId, 7, '0', STR_PAD_LEFT);
        }

        $docuFile =  $transac_id.'.'.$request->file('document')->getClientOriginalExtension();
        $request->document->move(public_path('Document/DocumentManagement/Receiving/Communication'), $docuFile);

            ReceiveCommunications::create([
            "transaction_id_num" => $transac_id,
            "document" => public_path('Document/DocumentManagement/Receiving/Communication').$docuFile
            ] + $request->validated());

            ActionHistory::create([
                'type_id' => $transac_id,
                'type' => 'Communication',
                'particulars' => 'Receive Communication',
                'user' => $request->user
            ]);

        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully saved under Transaction ID Number '.$transac_id,
        ]);

    }
        
}