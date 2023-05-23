<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\IncomeRelatedDocument;

use App\Http\Controllers\Controller;
use App\Models\DMCollectionDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionDepositReceiptController extends Controller
{
    public function collectionDepostReceipt(){

        $listReceipt = DMCollectionDeposit::select('id',
            DB::raw('DATE(created_at) AS Date'),
            'incom_transaction_id_no',
            'sender',
            'transaction_type',
            'fund_source',
            'rcd_date',
            'report_no',
            'cashbook_ref_no',
            'cash',
            'check',
            'online',
            'subject',
        )->get();

        return response()->json(['data' => $listReceipt]);
    }

    public function print(Request $request){

        $listReceipt = DMCollectionDeposit::select('id',
            DB::raw('DATE(created_at) AS Date'),
            'incom_transaction_id_no',
            'sender',
            'transaction_type',
            'fund_source',
            'rcd_date',
            'report_no',
            'cashbook_ref_no',
            'cash',
            'check',
            'online',
            'subject',
        )->whereIn('id', $request->id)->get();

        return response()->json(['data' => $listReceipt]);
    }
}
