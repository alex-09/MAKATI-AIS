<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\Communication;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Models\ReceiveCommType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ReceiveCommunications;
use App\Http\Requests\DocumentManagement\Receiving\CommRequest;
use App\Repositories\DocumentManagement\Receiving\Communications\ReceiveCommRepository;

class CommunicationController extends Controller
{

    private $receiveCommRepo;

    public function __construct(ReceiveCommRepository $receiveCommRepo)
    {
        return $this->receiveCommRepo = $receiveCommRepo;
    }

    public function commType(){

        return response()->json(['list' => ReceiveCommType::all()]);
    }

    //CREATE RECEIVE COMMUNICATION
    public function receive_comms(CommRequest $request)
    {
        try{    
            return $this->receiveCommRepo->receive($request);
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    // public function filterBearer(Request $request){
    //     try{
    //         $filterBearer = ReceiveCommunications::where('bearer_name', 'LIKE', '%'.$request->bearer.'%')->get();
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Success',
    //             'data' => $filterBearer
    //         ]);

    //     }catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //         ]);
    //     }
    // }

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

    // public function viewPdf($id){

    //     $data = 0;

    //     $pdf = PDF::loadView('receive_Comm.php', ['data' => $data])
    //         ->setPaper('a4', 'landscape');

    //     return $pdf->stream();
    // }
}
