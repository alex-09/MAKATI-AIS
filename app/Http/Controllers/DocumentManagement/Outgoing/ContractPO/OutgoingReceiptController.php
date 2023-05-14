<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\ContractPO;

use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OutgoingReceiptController extends Controller
{
    public function collectionDepostReceipt(){

        // $listReceipt = DmContractpo::select(
        //     DB::raw('DATE(created_at) AS Date'),
        //     DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
        //     'transaction_id',
        //     'transaction_type',
        //     'fund_source',
        //     'date_of_collection AS RCD Date',
        //     'amount',
        //     'bearer_name',
        // )->get();
}
}