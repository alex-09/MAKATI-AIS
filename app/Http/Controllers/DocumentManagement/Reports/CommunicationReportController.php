<?php

namespace App\Http\Controllers\DocumentManagement\Reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CreateCommunication;
use App\Http\Controllers\Controller;
use App\Models\ReceiveCommunications;

class CommunicationReportController extends Controller
{
    public function list()
    {
        $data = DB::select('SELECT * FROM dm_communication_reports_list');

        return response()->json([
            'status' => true,
            'list' => $data
        ]);
    }

    public function actionHistory($id){

        $data = DB::select('CALL get_actionhistory_id(?)',array($id));

        return response()->json([
            'list' => $data,
            'id' => $id
        ]);

    }

    public function edit(Request $request){
        try{

            if (substr($request->transac_id, 0, 3) == "COM") {
                $addTransmital = ReceiveCommunications::where('transaction_id_num', $request->transac_id);
                $addTransmital->update(['status' => $request->status]);
            } else {
                $addTransmital = CreateCommunication::where('transac_id', $request->transac_id);
                $addTransmital->update(['status' => $request->status]);
            }

            ActionHistory::create([
                'type_id' => $request->transac_id,
                'type' => 'Communication',
                'particulars' => 'Update Report Status'. " " . "by". " ". $request->user,
                'user' => $request->user
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Success'
            ]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }

    }
}
