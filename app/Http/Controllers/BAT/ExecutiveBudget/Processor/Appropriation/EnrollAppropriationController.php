<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use Illuminate\Http\Request;
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

    public function EnrollAppro(Request $request){
        try{
            return $this->enrollApproRepo->EnrollAppro($request);
        } catch(\Throwable $th){
            return $this->errorResponse($th);
        }

    } 

    public function addProgram(Request $request){
        try{
            return $this->enrollApproRepo->addProgram($request);
        }catch(\Throwable $th){
            return $this->errorResponse($th);
        }
    }

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

