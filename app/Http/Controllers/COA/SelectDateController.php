<?php

namespace App\Http\Controllers\COA;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\COAAssets;

class SelectDateController extends Controller
{
    public function coaDates(){
        $date = DB::select('CALL get_coaDate()');

        return response()->json([
            'data' => $date
        ]);
    }
}
