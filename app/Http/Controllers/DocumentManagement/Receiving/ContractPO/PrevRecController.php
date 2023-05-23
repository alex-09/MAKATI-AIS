<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ContractPO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use App\Repositories\DocumentManagement\Receiving\CONTRACTPO\PrevRecContractPORepository;

class PrevRecController extends Controller
{
    private $prevreContractPoRepo;

    public function __construct(PrevRecContractPORepository $prevreContractPoRepo)
    {
        $this->prevreContractPoRepo = $prevreContractPoRepo;
    }

    public function view(Request $request){

        return $this->prevreContractPoRepo->view($request);
    }

    public function update(Request $request){
        try {
            return $this->prevreContractPoRepo->update($request);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }

    }


}
