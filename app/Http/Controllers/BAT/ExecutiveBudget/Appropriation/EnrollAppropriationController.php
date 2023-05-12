<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Appropriation;

use App\Models\BudgetYear;
use App\Models\Department;
use App\Models\FundSource;
use Illuminate\Http\Request;
use App\Models\Appropriation;
use App\Models\AppropriationType;
use App\Http\Controllers\Controller;
use App\Services\EnrollApproService;
use App\Http\Requests\EnrollApproRequest;
use App\Repositories\BAT\Executive\Processor\EnrollApproRepository;

class EnrollAppropriationController extends Controller
{

    private $enrollApproRepo;

    public function __construct(EnrollApproRepository $enrollApproRepo)
    {
        return $this->enrollApproRepo = $enrollApproRepo;
    }

    public function dropdownList(){

        return response()->json(['dropdownList' => BudgetYear::all(),
            'approType' => AppropriationType::all(),
            'fundSource' => FundSource::all(),
            'department' => Department::all(),
        ]);
    }

    public function EnrollAppro(EnrollApproRequest $request){
        try{

            return $this->enrollApproRepo->EnrollAppro($request);
        } catch(\Throwable $th){
            return $this->errorResponse($th);
        }

    }


    // public function addProgram(EnrollApproRequest $request){

    //     try{

    //         $this->enrollApproRepo->addPrograms($request);
    //         return response()->json([
    //             'status' => true,
    //             'message' => "Add program Successfully!",
    //         ]);

    //     } catch(\Throwable $th) { 
    //         return $this->errorResponse($th); 
    //     }
    // }


    public function forReview(Request $request){
        
        $status = "for Review";
        $appro = Appropriation::where('appro_id', $request->appro_id)->first();
        $appro->update([
            'status' => $status
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Appropriation is now for Review',
        ], 200);
        
    }


    private function errorResponse($th){

        return response()->json([

            'status' => false,
            'message' => "Something went wrong!",
            'error' => $th->getMessage()

        ], 500);
    }
    
}

