<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\ContractPO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\ContractsPO\OutgoingContractPORepository;

class OGContractPOController extends Controller
{
    private $outgoingContractRepo;

    public function __construct(OutgoingContractPORepository $outgoingContractRepo)
    {
        $this->outgoingContractRepo = $outgoingContractRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_contractpo_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingContractRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingContractRepo->updateOutgoing($request);
    }
}
