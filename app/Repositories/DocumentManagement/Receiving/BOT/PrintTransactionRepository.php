<?php

namespace App\Repositories\DocumentManagement\Receiving\BOT;

use Illuminate\Support\Facades\DB;

class PrintTransactionRepository
{
    public function List(){

        return response()->json(['data' => DB::select('CALL get_dm_bot_for_print()')]);
    }
    
    public function print($request){
        $ids = implode(",", $request->id);
        return response()->json(['data' => DB::select('CALL dm_print_bot(?)', array($ids))]);
    }
}