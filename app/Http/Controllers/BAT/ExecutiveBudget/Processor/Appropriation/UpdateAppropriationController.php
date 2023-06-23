<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use Illuminate\Http\Request;
use App\Models\Appropriation;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateApproRequest;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;
use App\Models\AppropriationUpdate;
use App\Repositories\BAT\Executive\Processor\UpdateApproRepository;

class UpdateAppropriationController extends Controller
{
    private $updateApproRepo;

    public function __construct(UpdateApproRepository $updateApproRepo)
    {
        return $this->updateApproRepo = $updateApproRepo;
    }

    // FILTER APPROPRIATION FOR UPDATE
    public function getDepartment(Request $request)
    {
        return $this->updateApproRepo->getDepartment($request);
    }

    public function getProgram(Request $request)
    {
        return $this->updateApproRepo->getProgram($request);
    }

    public function getProject(Request $request)
    {
        return $this->updateApproRepo->getProject($request);
    }

    public function getActivity(Request $request)
    {
        return $this->updateApproRepo->getActivity($request);
    }

    public function getApproInfo(Request $request){
        return $this->updateApproRepo->getApproInfo($request);
    }

    public function updateAppro(Request $request){
        return $this->updateApproRepo->updateAppro($request);
    }
    
}
