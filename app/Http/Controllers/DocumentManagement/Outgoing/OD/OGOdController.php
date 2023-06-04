<?php

namespace App\Http\Controllers\Documentmanagement\Outgoing\OD;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\OD\OutgoingODRepository;

class OGOdController extends Controller
{
    private $outgoingOdRepo;

    public function __construct(OutgoingODRepository $outgoingOdRepo)
    {
        $this->outgoingOdRepo = $outgoingOdRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_other_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingOdRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingOdRepo->updateOutgoing($request);
    }
}
