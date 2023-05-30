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
                $transmital = "COM-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
            }else{
                $lastId = DmComTransmitalCounter::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transmital = "COM-" . $date . "-" . str_pad(++$botId, 5, '0', STR_PAD_LEFT);
            }

            DmComTransmitalCounter::create(['com_transmital' => $transmital]);

            for($i=0; $i<count($request->transac_id); $i++){  
                    if(substr($request->transac_id[$i], 0, 3) == "COM"){
                        $addTransmital = ReceiveCommunications::where('transaction_id_num', $request->transac_id[$i]);
                        $addTransmital->update(['og_transmital_no' => $transmital]);
                    }else{
                        $addTransmital = CreateCommunication::where('transac_id', $request->transac_id[$i]);
                        $addTransmital->update(['og_transmital_no' => $transmital]);
                    }
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

            for($i=0; $i<count($request->transac_id); $i++){  
                echo $request->transac_id[$i].'<br>';
                if(substr($request->transac_id[$i], 0, 3) == "COM"){
                    $addTransmital = ReceiveCommunications::where('transaction_id_num', $request->transac_id[$i]);
                    $addTransmital->update([
                        'og_sender' => $request->og_sender,
                        'og_received_by' => $request->og_received_by,
                        'og_date' => $request->og_date
                    ]);
                }else{
                    $addTransmital = CreateCommunication::where('transac_id', $request->transac_id[$i]);
                    $addTransmital->update($request->except('transac_id'));
                }
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
