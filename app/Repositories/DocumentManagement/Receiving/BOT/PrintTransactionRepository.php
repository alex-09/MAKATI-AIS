<?php

namespace App\Repositories\DocumentManagement\Receiving\BOT;

use Illuminate\Support\Facades\DB;
use App\Models\DMBudgetaryObligationsTransac;

class PrintTransactionRepository
{
    public function displayList(){

        $listPrintReceiver = DMBudgetaryObligationsTransac::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'transaction_id',
            'processing_slip_number',
            'department_id',
            'description',
            'amount',
            'current_bearer'
        )->get();

        return response()->json(['data' => $listPrintReceiver]);
    }
    

    public function searchBearer($bearer){

        // $searchResult = DMBudgetaryObligationsTransac::select('created_at', 'transaction_id', 'processing_slip_number', 'current_bearer')
        // ->where('current_bearer', 'LIKE', '%' . $bearer . '%')
        // ->get();

        // if (count($searchResult)) {
        //     return Response()->json($searchResult);
        // } else {
        //     return response()->json(['Result' => 'No Data not found'], 404);
        // }
    }
}