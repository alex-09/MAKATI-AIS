<?php

namespace App\Http\Controllers\BAT\TrustFund\CityAccountant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\TrustFund\CityAccountant\CityAccountantRepository;

class CAToApproveController extends Controller
{
    private $reviewerRepo;

    public function __construct(CityAccountantRepository $reviewerRepo)
    {
        return $this->reviewerRepo = $reviewerRepo;
    }

    public function reviewed(Request $request){
        try{

            return $this->reviewerRepo->toAprrove($request);

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
