<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument;

use App\Http\Controllers\Controller;
use App\Models\DMCollectionDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionDepositReceiptController extends Controller
{
    public function collectionDepostReceipt(){

        $listReceipt = DMCollectionDeposit::select(
            DB::raw('DATE(created_at) AS Date'),
            'incom_transaction_id_no',
            'transaction_type',
            'fund_source',
            'rcd_date AS RCD Date',
            'amount_collection',
            'bearer_name',
        )->get();

        return response()->json(['data' => $listReceipt]);
    }
}
