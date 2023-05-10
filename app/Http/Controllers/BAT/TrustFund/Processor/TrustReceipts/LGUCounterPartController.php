<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts;

use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\LGURequest;
use App\Repositories\BAT\TrustFund\EnrollTrustReceipts\LGURepository;

class LGUCounterPartController extends Controller
{

    private $lguRepo;

    public function __construct(LGURepository $lguRepo)
    {
        $this->lguRepo = $lguRepo;
    }
    
    public function insertData(LGURequest $request){
        try{

            return $this->lguRepo->enroll($request);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
