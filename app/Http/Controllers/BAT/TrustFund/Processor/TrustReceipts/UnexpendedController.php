<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts;

use Illuminate\Http\Request;
use App\Models\UnexpendedBalance;
use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\UnexpendedRequest;
use App\Repositories\BAT\TrustFund\EnrollTrustReceipts\UnexpendedRepository;

class UnexpendedController extends Controller
{

    private $unexRepo;

    public function __construct(UnexpendedRepository $unexRepo)
    {
        $this->unexRepo = $unexRepo;
    }
    
    public function insertData(UnexpendedRequest $request){
        try{

            return $this->unexRepo->enroll($request);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function addSubFund(Request $request){
        try{
            return $this->unexRepo->addSubFund($request);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function forReview(Request $request){
        try{
            return $this->unexRepo->forReview($request);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
