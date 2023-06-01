<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\CheckTranscation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\CheckTransaction\OutgoingCheckTransacRepository;

class OGCheckTransactionController extends Controller
{
    private $outgoingCTRepo;

    public function __construct(OutgoingCheckTransacRepository $outgoingCTRepo)
    {
        $this->outgoingCTRepo = $outgoingCTRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_bot_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingCTRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingCTRepo->updateOutgoing($request);
    }
}
