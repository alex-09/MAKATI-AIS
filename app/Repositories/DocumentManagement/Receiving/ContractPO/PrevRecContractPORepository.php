<?php

namespace App\Repositories\DocumentManagement\Receiving\CONTRACTPO;

use App\Models\DmContractpo;

class PrevRecContractPORepository
{
    public function view($request){
        $data = DmContractpo::where('transaction_id', $request->transac_no)
                            ->orWhere('contract_no', $request->contract_no)
                            ->orWhere('po_no', $request->po_no)
                            ->first();
        
        return response()->json(['data' => $data]);
    }

    public function update($request){
        $request->validate([
            'amount' => 'required',
            'current_bearer' => 'required',
            'current_bearer_dept' => 'required',
            'current_bearer_contact_number' => 'required',
            'current_bearer_email' => 'required',
        ]);

        $data = DmContractpo::where('transaction_id', $request->transac_no);
        $data->update($request->all());
        
        return response()->json(['message' => 'Your entry has been successfully saved under the same Transaction ID Number, '. $data['transaction_id']]);
    }
        
}