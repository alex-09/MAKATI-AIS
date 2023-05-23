<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\Communication;


use App\Models\ReceiveCommType;
use App\Http\Controllers\Controller;
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

}
