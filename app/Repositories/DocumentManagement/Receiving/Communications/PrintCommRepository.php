<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Illuminate\Support\Facades\DB;

class PrintCommRepository
{
    public function list(){
        return response()->json(['list' => DB::select('CALL receive_comm()')]);
    }

    public function print($request){

        $ids = implode(",", $request->id);
        return response()->json(['list' => DB::select('CALL dm_print_comm(?)', array($ids))]);
    }
        
}