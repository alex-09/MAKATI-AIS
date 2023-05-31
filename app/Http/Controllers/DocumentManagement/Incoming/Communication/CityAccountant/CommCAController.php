<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\Communication\CityAccountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ReceiveCommAssignto;
use App\Http\Controllers\Controller;
use App\Models\ActionHistory;
use App\Models\ReceiveCommAction;
use App\Models\ReceiveCommCluster;
use App\Models\ReceiveCommRestrict;
use App\Models\ReceiveCommStatus;
use App\Repositories\DocumentManagement\Incoming\Communications\UpdateCARepository;

class CommCAController extends Controller
{

    private $updateCARepo;

    public function __construct(UpdateCARepository $updateCARepo)
    {
        $this->updateCARepo = $updateCARepo;
    }

    public function list (){

        return response()->json([
            'list' => DB::select('CALL get_ca_communication()'),
            'division' => ReceiveCommAssignto::all(),
            'cluster' => ReceiveCommCluster::all(),
            'action' => ReceiveCommAction::all(),
            'restrcit' => ReceiveCommRestrict::all(),
            'status' => ReceiveCommStatus::all()
        ]);
    }

    public function update (Request $request){
        
        return $this->updateCARepo->update($request);
    }

    public function document(){
    }

    public function actionHistory($id){
        return response()->json([
            'list' => DB::select('CALL get_actionhistory_id(?)',array($id)),
            'id' => $id
        ]);

    }
}
