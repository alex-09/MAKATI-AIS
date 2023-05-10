<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\Obligation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\TRObligationRequest;
use App\Repositories\BAT\TrustFund\ObligationTrustReceipts\NewObligationTRRepository;

class TFObligationController extends Controller
{
    private $obliRepo;

    public function __construct(NewObligationTRRepository $obliRepo)
    {
        $this->obliRepo = $obliRepo;
    }

    public function store(TRObligationRequest $request){
        try{
            return $this->obliRepo->store($request);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

}
