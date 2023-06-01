<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\PreAudit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\PreAudit\OutgoingPreAuditRepository;

class OGPreauditController extends Controller
{
    private $outgoingPreaudRepo;

    public function __construct(OutgoingPreAuditRepository $outgoingPreaudRepo)
    {
        $this->outgoingPreaudRepo = $outgoingPreaudRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_preaud_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingPreaudRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingPreaudRepo->updateOutgoing($request);
    }
}
