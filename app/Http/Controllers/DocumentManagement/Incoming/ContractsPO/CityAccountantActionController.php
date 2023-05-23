<?php

namespace App\Http\Controllers\DocumentManagement\Incoming\ContractsPO;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Incoming\CPOCityAccountAction;
use App\Models\DMCPOCityAccountAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CityAccountantActionController extends Controller
{
    public function entryCityAccountant(CPOCityAccountAction $request){

        try{
    
            $odnewtransac = DMCPOCityAccountAction::create($request->validated());
        
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

    public function listCityAccountAction(){

        $cityAccountAction = DMCPOCityAccountAction::select(
            DB::raw('DATE(created_at) AS Date'),
            DB::raw('DATE_FORMAT(created_at, "%H:%i:%s") AS Time'),
            'particulars',
            'payee_name'
        )->get();

        return response()->json(['data' => $cityAccountAction]);
   
    }
}
