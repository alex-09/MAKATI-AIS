<?php

namespace App\Repositories\DocumentManagement\Receiving\CONTRACTPO;

use Illuminate\Support\Facades\DB;
use App\Models\DmContractpo;

class PrintRecContractPORepository
{
    public function displayList(){

        $listPrintReceiver = DmContractpo::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id',
            'department_id',
            'payee_name',
            'description',
            'amount',
            'current_bearer'
        )->get();

        return response()->json(['data' => $listPrintReceiver]);
    }

}