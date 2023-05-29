<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\Communication;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CreateCommunication;
use App\Http\Controllers\Controller;
use App\Models\ReceiveCommunications;
use App\Models\DmComTransmitalCounter;

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

            $date = Carbon::now()->format('Y');

            $table = DmComTransmitalCounter::all();
            if($table->isEmpty()){
                $transmital = "BOT-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
            }else{
                $lastId = DmComTransmitalCounter::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transmital = "BOT-" . $date . "-" . str_pad(++$botId, 5, '0', STR_PAD_LEFT);
            }

            DmComTransmitalCounter::create(['com_transmital' => $transmital]);
            
            if(substr($request->transac_id, 0, 3) == "COM"){
                $addTransmital = ReceiveCommunications::where('transaction_id_num', $request->transac_id);
                $addTransmital->update(['og_transmital_no' => $transmital]);
            }else{
                $addTransmital = CreateCommunication::where('transac_id', $request->transac_id);
                $addTransmital->update(['og_transmital_no' => $transmital]);
            }

            return response()->json(['message' => 'Your entry has been successfully saved under Transmittal ID Number '.$transmital]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function updateOutgoing(Request $request){
        try{

            if(substr($request->transac_id, 0, 3) == "COM"){
                $addTransmital = ReceiveCommunications::whereIn('transaction_id_num', $request->transac_id);
                $addTransmital->update($request->except('transac_id'));
            }else{
                $addTransmital = CreateCommunication::whereIn('transac_id', $request->transac_id);
                $addTransmital->update($request->except('transac_id'));
            }

            return response()->json(['message' => 'Your entry has been successfully saved.']);

        }catch(\Throwable $th){
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }
}
