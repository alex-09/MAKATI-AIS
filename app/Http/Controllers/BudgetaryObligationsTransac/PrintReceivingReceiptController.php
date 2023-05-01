<?php

namespace App\Http\Controllers\BudgetaryObligationsTransac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DMBudgetaryObligationsTransac;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PrintReceivingReceiptController extends Controller
{



public function listPrintReceiver(){


    $listPrintReceiver = DMBudgetaryObligationsTransac::select(DB::raw('DATE(created_at) AS Date'),
    DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
    'transaction_id', 'processing_slip_number', 'current_bearer')->get();

    return response()->json([
        'status' => true,
        'message' => 'Success',
        'data' => $listPrintReceiver,
        
        
    ]);
}


    public function searchBearer($bearer){

    
    $searchResult = DMBudgetaryObligationsTransac::select('created_at', 'transaction_id', 'processing_slip_number', 'current_bearer')
    ->where('current_bearer', 'LIKE', '%'. $bearer. '%')
    ->get();

    if(count($searchResult)){
        return Response()->json($searchResult);
       }
       else
       {
       return response()->json(['Result' => 'No Data not found'], 404);
     }

    }

}
