<?php

namespace App\Http\Controllers\BAT\TrustFund\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\TrustFund\Reviewer\ReviewObligationRepository;

class ReviewObligationController extends Controller
{
    private $reviewerObliRepo;

    public function __construct(ReviewObligationRepository $reviewerObliRepo)
    {
        return $this->reviewerObliRepo = $reviewerObliRepo;
    }

    public function reviewed(Request $request){
        try{

            return $this->reviewerObliRepo->toDiviHead($request);

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

            return $this->reviewerObliRepo->reject($request);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
