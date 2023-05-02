<?php

namespace App\Http\Controllers\BudgetaryObligationsTransac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DMBudgetaryObligationsTransac;

class PreviousTransactionsController extends Controller
{

public function previousList(Request $request){


        $listData = DMBudgetaryObligationsTransac::select(
            'transaction_id',
            'department',
            'amount',
            'department_type_id',
            'amount'
        )->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $listData,


        ]);
    }
}
