<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Appropriation;

use Illuminate\Http\Request;
use App\Models\Appropriation;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateApproRequest;
use App\Repositories\BAT\Executive\Processor\UpdateApproRepository;

class UpdateAppropriationController extends Controller
{
    private $updateApproRepo;

    public function __construct(UpdateApproRepository $updateApproRepo)
    {
        return $this->updateApproRepo = $updateApproRepo;
    }

    // FILTER APPROPRIATION FOR UPDATE
    public function FilterAppropriation(UpdateApproRequest $request)
    {
        try {
            return $this->updateApproRepo->filter($request);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function updateAppro(Request $request){
        try{
            $approRef = Appropriation::where('appro_id', $request->approId);
            return response()->json([
                'status' => true,
                'message' => 'Success!',
                'data' => $approRef
            ]);


        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);

        }
    }
    
}
