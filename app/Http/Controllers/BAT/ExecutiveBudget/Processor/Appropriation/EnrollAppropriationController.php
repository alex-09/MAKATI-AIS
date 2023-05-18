<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use App\Models\BudgetYear;
use App\Models\Department;
use App\Models\FundSource;
use Illuminate\Http\Request;
use App\Models\AppropriationType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollApproRequest;
use App\Repositories\BAT\Executive\Processor\EnrollApproRepository;

class EnrollAppropriationController extends Controller
{

    private $enrollApproRepo;

    public function __construct(EnrollApproRepository $enrollApproRepo)
    {
        return $this->enrollApproRepo = $enrollApproRepo;
    }

    public function EnrollAppro(EnrollApproRequest $request){
        try{
            return $this->enrollApproRepo->EnrollAppro($request);
        } catch(\Throwable $th){
            return $this->errorResponse($th);
        }

    } 
//remove upload file
    public function forReview(Request $request){
        return $this->enrollApproRepo->forReview($request);
    }


    private function errorResponse($th){
        return response()->json([
            'status' => false,
            'message' => "Something went wrong!",
            'error' => $th->getMessage()
        ], 500);
    }
    
}

