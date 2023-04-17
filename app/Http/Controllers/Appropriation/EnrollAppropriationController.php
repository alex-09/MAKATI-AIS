<?php

namespace App\Http\Controllers\Appropriation;

use App\Models\BudgetYear;
use App\Models\Department;
use App\Models\FundSource;
use Illuminate\Http\Request;
use App\Models\Appropriation;
use App\Services\EnrollApproService;
use App\Models\AppropriationType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EnrollApproRequest;

class EnrollAppropriationController extends Controller
{
    //RETRIEVE BUDGET YEAR LIST
    public function dropdownList(){

        // dd(Hash::make(now()->format('H:i:s')));
        return response()->json(['dropdownList' => BudgetYear::all(),
            'approType' => AppropriationType::all(),
            'fundSource' => FundSource::all(),
            'department' => Department::all(),
        ]);

    }


    public function EnrollAppro(EnrollApproRequest $request, EnrollApproService $services){
        try{

            $services->EnrollAppro($request);
            return response()->json([
                'message' => 'Appropriation Successfully Enrolled!'
            ]);

        } catch(\Throwable $th){
            return $this->errorResponse($th);
        }

    }


    public function addProgram(EnrollApproRequest $request, EnrollApproService $services){

        try{

            $services->addPrograms($request);
            return response()->json([
                'status' => true,
                'message' => "Add program Successfully!",
            ]);

        } catch(\Throwable $th) { 
            return $this->errorResponse($th); 
        }
    }


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

