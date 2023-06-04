<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ODReceivingReceiptController extends Controller
{
    public function list(){

        return response()->json(['data' => DB::select('CALL get_dm_do_transacs()')]);
    }

    public function print(Request $request){

        $ids = implode(",", $request->id);
        return response()->json(['data' => DB::select('CALL dm_print_do(?)',array($ids))]);
    }
}
