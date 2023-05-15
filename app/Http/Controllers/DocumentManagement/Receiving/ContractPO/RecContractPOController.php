<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ContractPO;

use App\Models\DMContractPOTypes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CPRequest;
use App\Repositories\DocumentManagement\Receiving\CONTRACTPO\RecContractPORepository;

class RecContractPOController extends Controller
{
    private $reContractPoRepo;

    public function __construct(RecContractPORepository $reContractPoRepo)
    {
        $this->reContractPoRepo = $reContractPoRepo;
    }

    public function list(){

        return response()->json([
            'list' => DMContractPOTypes::all(),
            'department' => DB::select('CALL departments()'),
            'payee' => DB::select('CALL pe_get_payee_name()')]);
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
