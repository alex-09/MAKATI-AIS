<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

use App\Http\Controllers\Controller;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\TRRequest;
use App\Repositories\BAT\TrustFund\EnrollTrustReceipts\TransferRepository;

class EnrollTransReceiptController extends Controller
{

    private $tranferRepo;

    public function __construct(TransferRepository $tranferRepo)
    {
        $this->tranferRepo = $tranferRepo;
    }
    

    public function enrollNew(TRRequest $request){
        try{

            return $this->tranferRepo->enroll($request);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }

    }

}