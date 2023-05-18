<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use App\Http\Controllers\Controller;
use App\Models\DMODNewTransac;
use App\Models\DMODPreviousTransac;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ODReceivingReceiptController extends Controller
{
    public function list(){

        $newTransacList = DMODNewTransac::select('id',
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id_no',
            'particulars',
        )->get();

        return response()->json(['data' => $newTransacList]);
    }

    public function print(Request $request){

        $prevTransacList = DMODNewTransac::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id_no',
            'particulars',
        )->whereIn('id', $request->id)
        ->get();;

        return response()->json(['data' => $prevTransacList]);
    }
}
