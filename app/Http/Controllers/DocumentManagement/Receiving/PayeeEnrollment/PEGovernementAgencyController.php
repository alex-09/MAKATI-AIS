<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use App\Http\Controllers\Controller;
use App\Models\PEGovernmentAgency;
use Illuminate\Http\Request;

class PEGovernementAgencyController extends Controller
{

    public function storeAgency(Request $request){
try{
        $agencyData = PEGovernmentAgency::create($this->validateAgencyData());

        return response()->json([
            'status' => true,
            'message' => 'Successfully Enrolled',
            'data' => $agencyData, 
        ]);

    }catch (\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => 'Something went Wrong',
            'error' => $th->getMessage()
        ]);
    }
}


    public function validateAgencyData()
    {
         return request()->validate([

            'type_of_payee_id' => 'required',
            'agency_name' => 'required',
            'building_no' => 'required',
            'lot_no' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality_city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'tax_id_no' => 'required',
            'authorized_rep' => 'required',
            'contact_no' => 'required',
            'email' => 'required',
            'date_registered' => 'required',
            'status' => 'required'
        ]);
    }
}
