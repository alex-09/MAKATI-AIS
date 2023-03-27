<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LiabilitiesController extends Controller
{
    //DISPLAY LIABILITIES
    public function showLiabilities(){

        $yearslist = DB::select('CALL coa_Liabilities()');

        return response()->json([

            'status' => True,
            'message' => 'Liabilities Display Successfully',
            'data' => $yearslist
        ]);
    }
    
}
