<?php

namespace App\Repositories\DocumentManagement\Receiving\CONTRACTPO;

use Carbon\Carbon;
use App\Models\DmContractpo;
use App\Http\Requests\DocumentManagement\Receiving\CPRequest;

class RecContractPORepository
{
    public function receiveCP(CPRequest $request){

        $date = Carbon::now()->format('Y-m');

        $table = DmContractpo::all();
        if($table->isEmpty()){
            $transac_id = "PT-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
        }else{
            $lastId = DmContractpo::latest('id')->select('id')->first();
            $ptId = $lastId['id'];
            $transac_id = "PT-" . $date . "-" . str_pad(++$ptId, 7, '0', STR_PAD_LEFT);
        }

        DmContractpo::create([
            'transaction_id' => $transac_id,
            'status' => 1
        ] + $request->validated());

        return response()->json([
            'message' => 'Your entry has been successfully saved under Transaction ID Number ' . $transac_id
        ], 200);

    }
}