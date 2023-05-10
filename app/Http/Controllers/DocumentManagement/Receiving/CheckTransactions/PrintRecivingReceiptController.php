<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions;

use App\Http\Controllers\Controller;
use App\Models\CTReceiveChecks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrintRecivingReceiptController extends Controller
{
    public function listPrintReceiving(){

        $listReceipt = CTReceiveChecks::select(
            DB::raw('DATE(created_at) AS Date'),
            'department_office',
            'dv_no',
            'check_no',
            'date_of_check AS Check Date',
            'payee_name',
            'particulars',
            'amount'
        )->get();

        return response()->json(['data' => $listReceipt]);
    }
}

