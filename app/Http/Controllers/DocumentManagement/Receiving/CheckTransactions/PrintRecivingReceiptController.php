<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions;

use App\Http\Controllers\Controller;
use App\Models\CTReceiveChecks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrintRecivingReceiptController extends Controller
{
    public function listPrintReceiving(){

        return response()->json(['data' => DB::select('CALL get_dm_check_payments()')]);
    }

    public function forPrint(Request $request){
        $ids = implode(",", $request->id);
        return response()->json(['list' => DB::select('CALL dm_print_check_payment(?)', array($ids))]);
    }   
}

