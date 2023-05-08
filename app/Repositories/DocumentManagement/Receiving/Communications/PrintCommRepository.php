<?php

namespace App\Repositories\DocumentManagement\Receiving\Communications;

use Illuminate\Support\Facades\DB;

class PrintCommRepository
{
    public function list(){
        $list = DB::select('CALL receive_comm()');

        return response()->json([
            'list' => $list
        ]);
    }
        
}