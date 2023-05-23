<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PreviousAccController extends Controller
{
    public function coaDates(){
        $date = DB::select('CALL get_prevYear()');

        return response()->json(['data' => $date]);
    }
    
    public function prevAsset(Request $request){ 
        $list = DB::select('CALL slct_AssetselectDate(?)',array(
            $request->date  
        ));

        return response()->json(['data' => $list]);
    }

    public function prevLiability(Request $request){ 
        $list = DB::select('CALL slct_LiabilitiesSelectDate(?)',array(
            $request->date  
        ));

        return response()->json(['data' => $list]);
    }

    public function prevEquity(Request $request){ 
        $list = DB::select('CALL slct_equitySelectDate(?)',array(
            $request->date  
        ));

        return response()->json(['data' => $list]);
    }

    public function prevExpenses(Request $request){ 
        $list = DB::select('CALL slct_expensesSelectDate(?)',array(
            $request->date  
        ));

        return response()->json(['data' => $list]);
    }

    public function prevIncome(Request $request){ 
        $list = DB::select('CALL slct_incomSelectDate(?)',array(
            $request->date  
        ));

        return response()->json([
            'data' => $list
        ]);
    }
}
