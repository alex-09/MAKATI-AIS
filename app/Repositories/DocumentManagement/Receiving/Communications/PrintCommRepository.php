<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use App\Models\ReceiveCommAction;
use App\Models\ReceiveCommunications;
use Illuminate\Support\Facades\DB;

class PrintCommRepository
{
    public function list(){
        $docu = ReceiveCommunications::select('document')->where('id', 7)->get();
        return response()->json(['list' => DB::select('CALL receive_comm()'),
        'docu' => $docu]);
    }

    public function print($request){

        $ids = implode(",", $request->id);
        return response()->json(['list' => DB::select('CALL dm_print_comm(?)', array($ids))]);
    }
        
}