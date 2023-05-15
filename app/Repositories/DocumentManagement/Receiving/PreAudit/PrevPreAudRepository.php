<?php

namespace App\Repositories\DocumentManagement\Receiving\PreAudit;

use App\Models\DmContractpo;
use App\Models\DmPreAudit;

class   PrevPreAudRepository
{
    public function searchTransac($request){

        $result = DmContractpo::where('transaction_id', $request->transaction_id)->first();
        return response()->json(['result' => $result]);
    }
    

    public function savePreAud($request){

        DmPreAudit::create(['status' => 1 ] + $request->all());
        return response()->json(['message' => 'Your entry has been successfully saved under the same Transaction ID Number.']);
    }
}