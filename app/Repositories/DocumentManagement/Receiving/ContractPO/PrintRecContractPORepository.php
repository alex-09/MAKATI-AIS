<?php

namespace App\Repositories\DocumentManagement\Receiving\CONTRACTPO;

use App\Models\DmContractpo;
use Illuminate\Support\Facades\DB;

class PrintRecContractPORepository
{
    public function displayList(){

        $listPrintReceiver = DB::select('CALL get_dm_contractpo()');

        return response()->json(['data' => $listPrintReceiver]);
    }

    public function print($request){
        $data = DmContractpo::select('transaction_id_num', 'department_id', 'payee_name', 'description', 
                                    'amount', 'current_bearer')
                                    ->whereIn('id', $request->id)
                                    ->first();

        return response()->json([
            'list' => $data
        ]);
    }

}