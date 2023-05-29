<?php

namespace App\Repositories\DocumentManagement\Incoming\Communications;

use App\Models\ActionHistory;
use Illuminate\Support\Facades\DB;

class ActionHistoryRepository
{
    public function listAct($id){
        return response()->json([
            'list' => DB::select('CALL get_actionhistory_id(?)',array($id)),
            'id' => $id
        ]);
    }

    public function addAct($request){
        ActionHistory::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Added Successfully',
        ]);
    }
        
}