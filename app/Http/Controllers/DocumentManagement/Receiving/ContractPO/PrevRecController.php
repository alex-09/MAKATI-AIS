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

    public function list(){

        return response()->json(['listAll' => DmContractpo::all()]);
    }

    public function update(Request $request, $id){
        try {
            return $this->prevreContractPoRepo->update($id, $request);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }

    }


}
