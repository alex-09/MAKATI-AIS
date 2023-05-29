<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\Communication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CreateCommunication;
use App\Models\ReceiveCommunications;

class OGCommunicationController extends Controller
{
    public function list(){
        return response()->json(['list' => DB::select('CALL list_comm_outgoing()')]);
    }

    public function listMc(){
        return response()->json(['listMc' => CreateCommunication::all('transac_id')]);
    }

    public function searchMc(Request $request){
        try{

            return response()->json(['data' => CreateCommunication::where('transac_id', $request->mc_no)->first()]);
        }catch(\Throwable $th){
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request){
        try{

            $update = CreateCommunication::where('transac_id', $request->mc_no);
            $update->update($request->all());

            return response()->json(['message' => 'Your entry has been successfully saved.']);

        }catch(\Throwable $th){
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function transmital(Request $request){
        try{

            $transmital = 'COM-2023-0001';
            
            if(substr($request->transac_id, 0, 3) == 'COM'){
                $addTransmital = ReceiveCommunications::whereIn('transaction_id_num', $request->transac_id);
                $addTransmital->update(['og_transmital_no' => $transmital]);
            }

        }catch(\Throwable $th){
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }
}
