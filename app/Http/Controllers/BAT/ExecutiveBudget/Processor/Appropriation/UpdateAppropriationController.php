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
    public function getDepartment(Request $request)
    {
        return $this->updateApproRepo->getDepartment($request);
    }

    public function getProgram(Request $request)
    {
        return $this->updateApproRepo->getProgram($request);
    }

    public function getProject(Request $request)
    {
        return $this->updateApproRepo->getProject($request);
    }

    public function getActivity(Request $request)
    {
        return $this->updateApproRepo->getActivity($request);
    }

    public function getApproInfo(Request $request){
        return $this->updateApproRepo->getApproInfo($request);
    }

    public function updateAppro(Request $request){
        try {
            AppropriationDetails::create(['status' => 'Update'] + $request->all);

            for($i=0; $i<count($request->account_code); $i++){
                AppropriationUpdate::create([
                    'appro_id' => $request->appro_id,
                    'AIPCode' => $request->aipcode,
                    'document_source' => $request->document_source, 
                    'date' => $request->date,
                    'adjustment_type' => $request->adjustment_type,
                    'adjustment_no' => $request->adjustment_no,
                    'account_code' => $request->account_code[$i],
                    'account_name' => $request->account_name[$i],
                    'balance' => $request->balance[$i],
                    'addition' => $request->addition[$i],
                    'deduction' => $request->deduction[$i],
                    'latest_balance' => $request->balance[$i],
                ]);
            }

            $updateAccCode = AppropriationExpenses::where('appro_id', $request->approId)
                ->where('AIPCode', $request->aipcode)
                ->where('account_code', $request->account_code);
            $updateAccCode->update(['latest_appro_amount' => $request->latest_balance]);

            return response()->json([
                'status' => true,
                'message' => 'Success!'
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
