<?php

namespace App\Repositories\DocumentManagement\Incoming\Communications;

use App\Models\ActionHistory;
use App\Models\CreateCommunication;
use App\Models\ReceiveCommunications;

class UpdateCARepository
{
    private function forUpdate($request, $update){
        $update->update([
            'receive_comm_assignto_id' => $request->assign_to,
            'restriction' => $request->restriction,
            'action' => $request->action,
            'cluster' => $request->cluster,
            'no_of_days' => $request->no_of_days
        ]);
    }

    public function update($request, $id){
        if($request->mc_no == null){
            $update = ReceiveCommunications::where('id', $id);
            $this->forUpdate($request, $update);
        }else{
            $update = CreateCommunication::where('id', $id);
            $this->forUpdate($request, $update); 
        }

        ActionHistory::create([
            'type_id' => $request->transaction_id_num,
            'type' => 'Payee Enrollment',
            'particulars' => 'Enroll Payee',
            'user' => $request->user
        ]);

        return response()->json([
            'status' => true,
            'message' => 'updated Successfully',
        ]);
    }
        
}