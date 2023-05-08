<?php

namespace App\Http\Controllers\BAT\TrustFund\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\TrustFund\Reviewer\ReviewerRepository;

class ReviewTRController extends Controller
{

    private $reviewerRepo;

    public function __construct(ReviewerRepository $reviewerRepo)
    {
        return $this->reviewerRepo = $reviewerRepo;
    }

    public function reviewed(Request $request){
        try{

            return $this->reviewerRepo->toDiviHead($request);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function reject(Request $request){
        try{

            return $this->reviewerRepo->reject($request);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
