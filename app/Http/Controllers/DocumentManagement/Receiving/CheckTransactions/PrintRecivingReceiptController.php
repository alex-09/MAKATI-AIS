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
        $data = CTReceiveChecks::select(DB::raw('DATE(created_at) AS Date'), 'transaction_id_num', 'department_office', 'dv_no', 
        'dv_no', 'check_no', 'date_of_check', 'payee_name', 'particulars', 'amount')
        ->whereIn('id', $request->id)
        ->get();

        return response()->json([
        'list' => $data
        ]);
    }   
}

