<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\ContractPO;

use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReceiptOthersController extends Controller
{
    public function receiptOthers(){

        $listReceipt = DmContractpo::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id',
            'department_id',
            'contract_no',
            'payee_name',
            'description',
            'amount',
        )->get();

        return response()->json(['data' => $listReceipt]);
   
}
public function transmittalOthersList(){

    $listReceipt = DmContractpo::select(
        'transaction_id',
        'department_id',
        'payee_name',
        'description',
        'amount',
    )->get();

    return response()->json(['data' => $listReceipt]);

}
}
