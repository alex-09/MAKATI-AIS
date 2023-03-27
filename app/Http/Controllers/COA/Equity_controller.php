<?php

namespace App\Http\Controllers\COA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Equity_controller extends Controller
{
    public function showEquity(){

        $yearslist = DB::select('CALL coa_equity()');

        return response()->json([

            'status' => True,
            'message' => 'Equity Display Successfully',
            'data' => $yearslist
        ]);
    }
}
