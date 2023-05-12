<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayeeEnrollment\IndividualRequest;
use App\Models\PEIndividual;
use Illuminate\Http\Request;

class PEIndividualController extends Controller
{

    public function storeIndividual(IndividualRequest $request){
        try{
        $individualData = PEIndividual::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Successfully Enrolled',
            'data' => $individualData, 
        ]);

        
    }catch (\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => 'Something went Wrong',
            'error' => $th->getMessage()
        ]);
    }
}


    public function validateIndividualData()
    {
         return request()->validate([

            'type_of_payee_id' => 'required',
            'client_type' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'suffix' => 'required',
            'building_no' => 'required',
            'lot_no' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality_city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'date_registered' => 'required',
            'status' => 'required'
        ]);
    }

    
}
    
