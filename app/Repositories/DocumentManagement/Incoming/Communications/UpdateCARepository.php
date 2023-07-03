<?php

namespace App\Repositories\DocumentManagement\Incoming\Communications;

use App\Models\ActionHistory;
use App\Models\CreateCommunication;
use App\Models\ReceiveCommunications;
use Illuminate\Notifications\Action;

class UpdateCARepository
{
    private function forUpdate($request, $update){

        $assignto = "";
        $space = ", ";

        foreach ($request->assign_to as $assign) {
            $assignto .= $assign . $space;
        }

        $assignto = rtrim($assignto, $space);

        $update->update([
            'receive_comm_assignto_id' => $assignto,
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

        if($request->restriction == NULL && $request->action == NULL && $request->cluser == NULL && $request->no_of_days == NULL && $request->assign_to == NULL){
            ActionHistory::create([
                'type_id' => $request->transac_id,
                'type' => 'Communication',
                'particulars' => 'Communication Status: '. $request->status,
                'user' => $request->user
            ]);
        }else{
            if($request->assign_to == NULL){
                $assignto = "N/A";
            }else{
                $assignto = "";
                $space = ", ";
        
                foreach ($request->assign_to as $assign) {
                    $assignto .= $assign . $space;
                }
                $assignto = rtrim($assignto, $space);
            }
    
            ActionHistory::create([
                'type_id' => $request->transac_id,
                'type' => 'Communication',
                'particulars' => 'Communication Assigned to: '. $assignto,
                'user' => $request->user
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'updated Successfully',
        ]);
    }   
}