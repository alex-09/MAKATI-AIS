<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\CollectionDeposit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\CollectionDeposit\OutgoingCollectionDepositRepository;

class OGCollectionDepositController extends Controller
{
    private $outgoingRcdRepo;

    public function __construct(OutgoingCollectionDepositRepository $outgoingRcdRepo)
    {
        $this->outgoingRcdRepo = $outgoingRcdRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_rcd_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingRcdRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingRcdRepo->updateOutgoing($request);
    }
}
