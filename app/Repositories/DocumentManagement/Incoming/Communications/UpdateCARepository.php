<?php

namespace App\Repositories\DocumentManagement\Incoming\Communications;

use App\Models\ActionHistory;
use App\Models\CreateCommunication;
use App\Models\ReceiveCommunications;
use Illuminate\Notifications\Action;

class UpdateCARepository
{
    private function forUpdate($request, $update){
        $update->update([
            'receive_comm_assignto_id' => $request->assign_to,
            'restriction' => $request->restriction,
            'action' => $request->action,
            'cluster' => $request->cluster,
            'no_of_days' => $request->no_of_days,
            'status' => $request->status
        ]);
    }

    public function update($request){
        if($request->mc_no == null){
            $update = ReceiveCommunications::where('transaction_id_num', $request->transac_id);

            $this->forUpdate($request, $update);
        }else{
            $update = CreateCommunication::where('transac_id', $request->transac_id); 
            $this->forUpdate($request, $update); 
        }

        ActionHistory::create([
            'type_id' => $request->transac_id,
            'type' => 'Communication',
            'particulars' => 'Assign Communication',
            'user' => $request->user
        ]);

        return response()->json([
            'status' => true,
            'message' => 'updated Successfully',
        ]);
    }
        
}