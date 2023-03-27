<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    //DISPLAY EXPENSES
    public function showExpenses(){

        $yearslist = DB::select('CALL coa_expenses()');

        return response()->json([

            'status' => True,
            'message' => 'Expenses Display Successfully',
            'data' => $yearslist
        ]);
    }
}
