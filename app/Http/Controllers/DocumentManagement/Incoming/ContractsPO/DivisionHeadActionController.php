<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\ContractsPO;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Incoming\CPOHeadDivisionAction;
use App\Models\DMCPOHeadDivisionAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DivisionHeadActionController extends Controller
{
    public function entryHeadDivision(CPOHeadDivisionAction $request){

        try{
    
            $odnewtransac = DMCPOHeadDivisionAction::create($request->validated());
        
            return response()->json([
                'status' => true,
                'message' => 'Successfully Enrolled',
                'data' => $odnewtransac
            ]);
    
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }

    }

    public function listDivisionHeadAction(){

        $headDivisionAction = DMCPOHeadDivisionAction::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'particulars',
            'payee_name'
        )->get();

        return response()->json(['data' => $headDivisionAction]);
   
    }
}
