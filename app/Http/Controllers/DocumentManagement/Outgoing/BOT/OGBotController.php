<?php

namespace App\Http\Controllers\DocumentManagement\Outgoing\BOT;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Outgoing\BOT\OutgoingBotRepository;

class OGBotController extends Controller
{

    private $outgoingBotRepo;

    public function __construct(OutgoingBotRepository $outgoingBotRepo)
    {
        $this->outgoingBotRepo = $outgoingBotRepo;
    }

    public function list(){
        return response()->json(['list' => DB::select('CALL list_bot_outgoing')]);
    }

    public function transmital(Request $request){
        return $this->outgoingBotRepo->transmital($request);
    }

    public function updateOutgoing(Request $request){
        return $this->outgoingBotRepo->updateOutgoing($request);
    }
}
