<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\Executive\Allotment\AllotmentRequest;
use App\Repositories\BAT\Executive\Processor\Allotment\EnrollAllotmentRepository;

class EnrollAllotmentController extends Controller
{
    private $enrollAllotRepo;

    public function __construct(EnrollAllotmentRepository $enrollAllotRepo)
    {
        return $this->enrollAllotRepo = $enrollAllotRepo;
    }

    public function department(Request $request){

        return $this->enrollAllotRepo->department($request);

    }

    public function approType(Request $request){

        return $this->enrollAllotRepo->approType($request);

    }

    public function program(Request $request){

        return $this->enrollAllotRepo->program($request);

    }

    public function project(Request $request){

        return $this->enrollAllotRepo->project($request);

    }

    public function activity(Request $request){

        return $this->enrollAllotRepo->activity($request);

    }

    public function expense(Request $request){

        return $this->enrollAllotRepo->expense($request);

    }

    public function enroll(Request $request){
        
        return $this->enrollAllotRepo->enroll($request);
        
    }

    public function forReview(Request $request){

        return $this->enrollAllotRepo->forReview($request);

    }
}
