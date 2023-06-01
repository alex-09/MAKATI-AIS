<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\PaymentTransaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\PaymentTransaction\OutgoingPaytransacRepository;

class OGPaytransacController extends Controller
{
    private $outgoingpaytransacRepo;

    public function __construct(OutgoingPaytransacRepository $outgoingpaytransacRepo)
    {
        $this->outgoingpaytransacRepo = $outgoingpaytransacRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_paytransac_outgoing_sp')]);
    }

    public function transmital(Request $request){
        return $this->outgoingpaytransacRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingpaytransacRepo->updateOutgoing($request);
    }
}
