<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Income_controller extends Controller
{
    public function showIncome(){

        $yearslist = DB::select('CALL coa_income()');

        return response()->json([

            'status' => True,
            'message' => 'Income Display Successfully',
            'data' => $yearslist
        ]);
    }
}
