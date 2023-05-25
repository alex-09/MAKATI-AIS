<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\Communication\CityAccountant;

use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Http\Controllers\Controller;
use App\Repositories\DocumentManagement\Incoming\Communications\ActionHistoryRepository;

class CAActionHistoryController extends Controller
{
    private $actionCARepo;

    public function __construct(ActionHistoryRepository $actionCARepo)
    {
        $this->actionCARepo = $actionCARepo;
    }

    public function list($id){
        return $this->actionCARepo->listAct($id);
    }

    public function addActHistory(Request $request){

        return $this->actionCARepo->addAct($request);
    }

}
