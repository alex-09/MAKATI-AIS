<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\CheckTransactions;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\CheckTransacRequest;
use App\Models\CTReceiveChecks;
use Illuminate\Http\Request;

class ReceiveChecksController extends Controller
{
   
    public function storeReceiveChecks(CheckTransacRequest $request){

        try{
            $payeeinfo = CTReceiveChecks::create($request->validated());
        
            return response()->json([
                'status' => true,
                'message' => 'Successfully Enrolled',
                'data' => $payeeinfo
            ]);
    
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
            }
}
