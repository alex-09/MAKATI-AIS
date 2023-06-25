<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use App\Models\Activity;
use App\Models\Expenses;
use App\Models\Allotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\Executive\Processor\Allotment\EnrollAllotmentRepository;

class UpdateAllotmentController extends Controller
{
    private $updateAllotRepo;

    public function __construct(UpdateAllotmentRepository $updateAllotRepo)
    {
        return $this->updateAllotRepo = $updateAllotRepo;
    }

    public function department(Request $request){

        return $this->updateAllotRepo->department($request);

    }

    public function program(Request $request){

        return $this->updateAllotRepo->program($request);

    }

    public function project(Request $request){

        return $this->updateAllotRepo->project($request);

    }

    public function activity(Request $request){

        return $this->updateAllotRepo->activity($request);
        
    }

    public function expense(Request $request){

        return $this->updateAllotRepo->expense($request);

    }

    public function update(Request $request){

        return $this->updateAllotRepo->update($request);

    }


    public function forReview($request){

        return $this->updateAllotRepo->forReview($request);

    }
}
