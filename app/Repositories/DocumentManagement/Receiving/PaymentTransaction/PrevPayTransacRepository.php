<?php

namespace App\Repositories\DocumentManagement\Receiving\PaymentTransaction;

use App\Models\DmPaymentTransaction;

class PrevPayTransacRepository
{
    public function searchTransac($request){

        $result = DmPaymentTransaction::where('transac_id', $request->transaction_id)->first();
        return response()->json(['result' => $result]);
    }

    public function saveTransac($request){
        $request->validate([
            'current_bearer' => 'required',
            'current_bearer_dept' => 'required',
            'current_bearer_contact_number' => 'required',
            'current_bearer_email' => 'required',
        ]);

        $update = DmPaymentTransaction::where('transac_id', $request->transac_id)->first();

        $update->update($request->all());
        return response()->json(['message' => 'Your entry has been successfully saved under the same Transaction ID Number.']);
    }
}