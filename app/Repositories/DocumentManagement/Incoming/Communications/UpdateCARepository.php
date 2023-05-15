<?php

namespace App\Repositories\DocumentManagement\Incoming\Communications;

use App\Models\ReceiveCommunications;

class UpdateCARepository
{
    public function update($request, $id){
        $update = ReceiveCommunications::where('id', $id);
        $update->update([
            'receive_comm_assignto_id' => $request->assign_to,
            'restriction' => $request->restriction,
            'action' => $request->action,
            'cluster' => $request->cluster,
            'no_of_days' => $request->no_of_days
        ]);

        return response()->json([
            'status' => true,
            'message' => 'updated Successfully',
        ]);
    }
        
}