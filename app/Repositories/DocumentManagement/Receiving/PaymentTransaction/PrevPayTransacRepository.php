<?php

namespace App\Repositories\DocumentManagement\Receiving\PaymentTransaction;

use App\Models\DmPaymentTransaction;

class PrevPayTransacRepository
{
    public function searchTransac($request){

        $result = DmPaymentTransaction::where('transaction_id', $request->transaction_id)->first();
        return response()->json(['result' => $result]);
    }

    public function savePreAud($request){

        DmPaymentTransaction::create($request->all());
        return response()->json(['message' => 'Your entry has been successfully saved under the same Transaction ID Number.']);
    }
}