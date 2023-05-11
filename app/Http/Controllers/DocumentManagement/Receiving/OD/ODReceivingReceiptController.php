<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use App\Http\Controllers\Controller;
use App\Models\DMODNewTransac;
use App\Models\DMODPreviousTransac;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ODReceivingReceiptController extends Controller
{
    public function newTransacReceipt(){

        $newTransacList = DMODNewTransac::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id_no',
            'particulars',
        )->get();

        return response()->json(['data' => $newTransacList]);
    }

    public function prevTransacReceipt(){

        $prevTransacList = DMODPreviousTransac::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id_no',
            'particulars',
        )->get();

        return response()->json(['data' => $prevTransacList]);
    }
}
