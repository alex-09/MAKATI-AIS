<?php

namespace App\Repositories\DocumentManagement\Receiving\BOT;

use App\Models\DMBudgetaryObligationsTransac;

class PrevTransactionRepository
{

    public function editTransaction($id, $request){

        $request->validate([
            'amount' => 'required',
            'current_bearer' => 'required',
            'current_bearer_dept' => 'required',
            'current_bearer_contact_number' => 'required',
            'current_bearer_email' => 'required',
        ]);

        $data = DMBudgetaryObligationsTransac::where('id', $id)->first();
        $data->update($request->all());
        
        return response()->json(['message' => 'Your entry has been successfully saved under the same Transaction ID Number, '. $data['transaction_id']]);
    }
}