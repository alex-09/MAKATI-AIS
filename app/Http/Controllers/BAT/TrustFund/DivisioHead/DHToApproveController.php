<?php

namespace App\Http\Controllers\BAT\TrustFund\DivisioHead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\TrustFund\DivisionHead\DivisionHeadRepository;

class DHToApproveController extends Controller
{
    private $DhRepo;

    public function __construct(DivisionHeadRepository $DhRepo)
    {
        return $this->DhRepo = $DhRepo;
    }

    public function reviewed(Request $request){
        try{

            return $this->DhRepo->toCA($request);

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

            return $this->DhRepo->reject($request);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
