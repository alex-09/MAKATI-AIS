<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Illuminate\Support\Facades\DB;
use App\Models\ReceiveCommunications;

class PrintCommRepository
{
    public function list(){
        $list = DB::select('CALL receive_comm()');

        return response()->json([
            'list' => $list
        ]);
    }

    public function print($request){
        $data = ReceiveCommunications::select('id', 'transaction_id_num', 'subject', 'sender', 'bearer_name')
                                    ->whereIn('id', $request->id)
                                    ->get();

        return response()->json([
            'list' => $data
        ]);
    }
        
}