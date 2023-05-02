<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ContractPO;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CPRequest;
use App\Models\DMContractPOTypes;
use App\Repositories\DocumentManagement\Receiving\CONTRACTPO\RecContractPORepository;

class RecContractPOController extends Controller
{
    private $reContractPoRepo;

    public function __construct(RecContractPORepository $reContractPoRepo)
    {
        $this->reContractPoRepo = $reContractPoRepo;
    }

    public function listType(){

        return response()->json(['list' => DMContractPOTypes::all()]);
    }

    public function receiveCP(CPRequest $request){
        try{

            return $this->reContractPoRepo->receiveCP($request);
            
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
