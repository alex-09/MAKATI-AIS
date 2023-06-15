<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\UpdateTR;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\TrustFund\UpdateTrustReceipts\UpdateTRRepository;

class UpdateTRController extends Controller
{

    private $updateRepo;

    public function __construct(UpdateTRRepository $updateRepo)
    {
        $this->updateRepo = $updateRepo;
    }

    public function getMainFund(){
        
        return $this->updateRepo->listMainFund();
    }
    
    public function search(Request $request){
        try{
            
            return $this->updateRepo->search($request);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request){
        try{
            
            return $this->updateRepo->update($request);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
