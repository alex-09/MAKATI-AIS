<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\UpdateObligation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BAT\TrustFund\UpdateObligation\UpdateObligationRepository;

class UpdateObligationController extends Controller
{
    private $updateObliRepo;

    public function __construct(UpdateObligationRepository $updateObliRepo)
    {
        $this->updateObliRepo = $updateObliRepo;
    }
    
    public function search(Request $request){
        try{
            
            return $this->updateObliRepo->search($request);

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
            
            return $this->updateObliRepo->update($request);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
