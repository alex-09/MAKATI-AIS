<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\Communications;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CreateCommunication;
use App\Http\Controllers\Controller;;
use App\Repositories\DocumentManagement\Outgoing\Communications\OutgoingCommRepository;

class OGCommunicationController extends Controller
{

    private $outgoingCommRepo;

    public function __construct(OutgoingCommRepository $outgoingCommRepo)
    {
        $this->outgoingCommRepo = $outgoingCommRepo;
    }

    public function list()
    {
        return response()->json(['list' => DB::select('CALL list_comm_outgoing()')]);
    }

    public function listMc()
    {
        return response()->json(['listMc' => CreateCommunication::all('transac_id')]);
    }

    public function searchMc()
    {
        return $this->outgoingCommRepo->searchMc();
    }

    public function update(Request $request)
    {
        return $this->outgoingCommRepo->update($request);
    }

    public function transmital(Request $request)
    {
        return $this->outgoingCommRepo->transmital($request);
    }

    public function updateOutgoing(Request $request)
    {
        return $this->outgoingCommRepo->updateOutgoing($request);
    }
}
