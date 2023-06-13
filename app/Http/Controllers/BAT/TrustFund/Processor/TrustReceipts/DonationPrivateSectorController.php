<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\TrustReceipts;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\BAT\TrustFund\TrustReceipt\DPSRequest;
use App\Repositories\BAT\TrustFund\EnrollTrustReceipts\DonationRepository;


class DonationPrivateSectorController extends Controller
{

    private $donationRepo;

    public function __construct(DonationRepository $donationRepo)
    {
        $this->donationRepo = $donationRepo;
    }

    public function srcTrustReceipt()
    {
        // Retrieve data from the database
        $list = DB::table('src_trust_receipt')
                    ->select('id', 'str_name')
                    ->get();
    
        // Convert the list to a JSON response
        return response()->json($list);
    }

    public function enrollDonate(DPSRequest $request){
        try{

            return $this->donationRepo->enroll($request);

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
            return $this->donationRepo->addSubFund($request);
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
            return $this->donationRepo->forReview($request);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
