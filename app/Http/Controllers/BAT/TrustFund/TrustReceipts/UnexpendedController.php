<?php

namespace App\Http\Controllers\BAT\TrustFund\TrustReceipts;

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

    public function upload(Request $request)
    {
 
    
       $upload = new UnexpendedBalance();

       $upload->file = $request->file->hashName();

       $result = $upload->save();
       if($result){

        return response()->json([

            'result' => 'File Added'
        ]);

       }else{
        return response()->json([
            'result' => 'File Not Added'
        ]);
       }

    }
}
