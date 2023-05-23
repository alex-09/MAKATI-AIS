<?php

namespace App\Repositories\DocumentManagement\Receiving\CONTRACTPO;

use App\Models\DmContractpo;
use Illuminate\Support\Facades\DB;

class PrintRecContractPORepository
{
    public function displayList(){

        $listPrintReceiver = DB::select('CALL get_dm_contractpo()');

        return response()->json(['data' => $listPrintReceiver]);
    }

    public function print($request){

        $ids = implode(",", $request->id);
        return response()->json(['list' => DB::select('CALL dm_print_contractpo(?)',array($ids))]);
    }

}