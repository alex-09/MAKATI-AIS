<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\ODPreviousTransac;
use App\Models\DMODPreviousTransac;
use Illuminate\Http\Request;

class PreviousTransacController extends Controller
{
    public function insertPrevTransac(ODPreviousTransac $request){
        try{
    
            $odprevtransac = DMODPreviousTransac::create($request->validated());
        
            return response()->json([
                'status' => true,
                'message' => 'Successfully Enrolled',
                'data' => $odprevtransac
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
