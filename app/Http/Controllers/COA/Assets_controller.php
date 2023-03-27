<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Assets_controller extends Controller
{
    public function showAssets(){

        $yearslist = DB::select('CALL coa_assets()');

        return response()->json([

            'status' => True,
            'message' => 'Assets Display Successfully',
            'data' => $yearslist
        ]);
    }
    
}
