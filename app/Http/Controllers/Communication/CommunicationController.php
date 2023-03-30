<?php

namespace App\Http\Controllers\Communication;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActionHistory;
use App\Models\ReceiveCommunications;

class CommunicationController extends Controller
{
    //CREATE RECEIVE COMMUNICATION
    public function receive_comms(Request $request){

        try{

            //GET YEAR AND MONTH 
            $date = Carbon::now()->format('Y-M');

            //GET THE LAST ID INSERTED IN TABLE
            $lastId = ReceiveCommunications::latest('id')->first();

            // $transac_id = "COM-" . $date . "-" . str_pad('0', 7, '0', STR_PAD_LEFT);
            //THE COMMENTED LINE ABOVE IS A FUNCTION THAT MAKES TRANSACTION ID WHEN THE TABLE IS EMPTY (NO ID TO RETRIEVE)
            $transac_id = "COM-" . $date . "-" . str_pad($lastId['id'], 7, '0', STR_PAD_LEFT);

            $insertRecCom = ReceiveCommunications::create([

                'transaction_id_num' => $transac_id,
                'type' => $request->type,
                'subject' => $request->subject,
                'department' => $request->department,
                'email' => $request->email,
                'DRN' => $request->drn,
                'reply_to' => $request->reply_to,
                'sender' => $request->sender,
                'contact_no' => $request->contact_no,
                'bearer_name' => $request->bearer_name,
                'bearer_address' => $request->bearer_address,
                'bearer_contact_no' => $request->bearer_contact_no,
                'bearer_department' => $request->bearer_department,
                'document' => $request->document,
                'remarks' => $request->remarks

            ]);

            return response()->json([
                'status' => false,
                'message' => 'Inserted Successfully',
                'data' => $insertRecCom
            ]);

        }catch (\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    //FILTER AND DISPLAY BEARERS NAME AND TRANSACTIONS
    public function filterBearer(Request $request){

        try{

            $filterBearer = ReceiveCommunications::where('bearer_name', 'LIKE', '%'.$request->bearer.'%')->get();

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $filterBearer
            ]);

        }catch (\Throwable $th) {

            return response()->json([
                'status' => false,

            ]);
        }
    }

    //DISPLAY ALL RECEIVED COMMUNICATION
    public function showRecComm(){
        $getRecCom = DB::select('CALL receive_comm()');

        return response()->json([

            'status' => True,
            'message' => 'Receive Comms Display Successfully',
            'data' => $getRecCom
        ]);
    }

    //UPDATE COMMUNICATION (ASSINED_TO, ACTION, STATUS...)
    public function updateComm(Request $request, $id){

        try{

            $updateComm = ReceiveCommunications::where('id', $id)->first();

            $updateComm->update([

                'type' => $request->type,
                'subject' => $request->subject,
                'sender' => $request->sender,
                'assign_to' => $request->assign_to,
                'cluster' => $request->cluster,
                'restriction' => $request->restriction,
                'action' => $request->action,
                'no_of_days' => $request->no_of_days,
                'status' => $request->status,

            ]);

            return response()->json([
                
                'status' => true,
                'message' => 'Updated Successfully!',
                'data' => $updateComm

            ]);

        }catch(\Throwable $th){
            
            return response()->json([
                'status' => false,
                'message' => 'Something wnet wrong!',
                'erros' => $th->getMessage()

            ]);

        }
        
    }

    //FILTER COMMUNICATION
    public function searchComm(Request $request) {

        try{

            $commSearch = ReceiveCommunications::where('department', $request->department)
            ->orWhere('DRN', $request->drn)
            ->orWhere('sender', $request->sender)
            ->orWhere('reply_to', $request->reply_to)
            ->orWhere('cluster', $request->cluster)
            ->orWhere('type', $request->type)
            ->orWhere('transaction_id_num', $request->transac_id)
            ->orWhere('restriction', $request->restriction)->get();

            return response()->json([
                'status' => true,
                'message' => 'Results',
                'data' => $commSearch
            ]);

        }catch (\Throwable $th) {

            return response()->json([

                'status' => false,
                'message' => 'Something Went Wrong!',
                'error' => $th->getMessage()

            ]);
        }
    }

    public function createActionHistory(Request $request, $id){

        try{

            $transac_id = ReceiveCommunications::where('id', $id)->first();

            $insertAction = ActionHistory::create([

                'transaction_id' => $transac_id['transaction_id_num'],
                'date' => $request->date,
                'time' => $request->time,
                'particulars' => $request->particulars,
                'creator' => $request->creator
                
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Inserted Successfully',
                'data' => $insertAction
            ]);

        }catch (\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()

            ]);
        }
    }

    public function commFrs(){

        $frs = ReceiveCommunications::whereIn('assign_to', 
        ['Financial Reporting Division', 
        'Bookkeeping Division',
        'Barangay Account Division'])
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'RFS cluster',
            'data' => $frs
        ]);


    }

    public function commAics(){

        $frs = ReceiveCommunications::whereIn('assign_to', 
        ['Administrative Division', 
        'Payroll Processing and Remittances Division',
        'Processing of Claims and Internal Control Division'])
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'AICS cluster',
            'data' => $frs
        ]);


    }
}
