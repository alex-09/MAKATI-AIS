<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\ODNewTransac;
use App\Models\DMODNewTransac;
use Illuminate\Http\Request;

class NewTransacController extends Controller
{
    public function insertNewTransac(ODNewTransac $request){
        try{
    
            $odnewtransac = DMODNewTransac::create($request->validated());
        
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
}
