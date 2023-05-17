<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions;

use App\Http\Controllers\Controller;
use App\Models\CTReceiveChecks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrintRecivingReceiptController extends Controller
{
    public function listPrintReceiving(){

        $listReceipt = DB::select('CALL get_dm_check_payments()');

        return response()->json(['data' => $listReceipt]);
    }

    public function forPrint(Request $request){
        $data = ReceiveCommunications::select('id', 'transaction_id_num', 'subject', 'sender', 'bearer_name')
        ->whereIn('id', $request->id)
        ->get();

        return response()->json([
        'list' => $data
        ]);
    }   
}

