<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\ContractsPO;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Incoming\CPOProcessorAction;
use App\Models\DMCPOProcessorAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProcessorActionController extends Controller
{
    public function entryProcessor(CPOProcessorAction $request){

        try{
    
            $odnewtransac = DMCPOProcessorAction::create($request->validated());
        
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

    public function listProcessorAction(){

        $processorAction = DMCPOProcessorAction::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'particulars',
            'payee_name'
        )->get();

        return response()->json(['data' => $processorAction]);
   
    }
}
