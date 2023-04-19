<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SelectDateController extends Controller
{
    public function coaDates(){
        $date = DB::select('CALL get_prevYear()');

        return response()->json([
            'data' => $date
        ]);
    }

    public function prevAccount(Request $request){ 
        $date = DB::select('CALL get_selectDate(?)',array(
            $request->date  
        ));

        return response()->json([
            'data' => $date
        ]);
    }
}
