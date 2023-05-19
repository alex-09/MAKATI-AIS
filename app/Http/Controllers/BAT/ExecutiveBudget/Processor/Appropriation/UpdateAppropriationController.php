<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use Illuminate\Http\Request;
use App\Models\Appropriation;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateApproRequest;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;
use App\Models\AppropriationUpdate;
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
        try {
            $approRef = AppropriationDetails::where('appro_id', $request->approId)
                ->where('AIPCode', $request->aipcode);
            $approRef->update(['status' => 'Update']);

            AppropriationUpdate::create([$request->all()]);

            $updateAccCode = AppropriationExpenses::where('appro_id', $request->approId)
                ->where('AIPCode', $request->aipcode)
                ->where('account_code', $request->account_code);
            $updateAccCode->update(['latest_appro_amount' => $request->latest_balance]);

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
