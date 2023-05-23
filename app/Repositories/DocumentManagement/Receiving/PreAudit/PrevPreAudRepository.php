<?php

namespace App\Repositories\DocumentManagement\Receiving\PreAudit;

use App\Models\DmPreAudit;
use App\Models\DmContractpo;

class PrevPreAudRepository
{
    public function searchTransac($request){

        $result = DmContractpo::where('transaction_id', $request->transaction_id)->first();
        return response()->json(['result' => $result]);
    }
    

    public function savePreAud($request){

        DmPreAudit::create(['status' => 1 ] + $request->validated());
        return response()->json(['message' => 'Your entry has been successfully saved under the same Transaction ID Number.']);
    }
}