<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use App\Http\Controllers\Controller;
use App\Models\PEBusiness;
use Illuminate\Http\Request;

class PEBusinessController extends Controller
{

    public function storeBusiness(Request $request){
try{
        $businessData = PEBusiness::create($this->validateBusinessData());

        return response()->json([
            'status' => true,
            'message' => 'Successfully Enrolled',
            'data' => $businessData, 
        ]);

    }catch (\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => 'Something went Wrong',
            'error' => $th->getMessage()
        ]);
    }
    }

    public function validateBusinessData()
    {
         return request()->validate([

            'type_of_payee_id' => 'required',
            'business_name' => 'required',
            'building_no' => 'required',
            'lot_no' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'municipality_city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'tax_id_no' => 'required',
            'dti_no' => 'required',
            'section_no' => 'required',
            'cda_no' => 'required',
            'authorized_rep' => 'required',
            'contact_no' => 'required',
            'email' => 'required',
            'date_registered' => 'required',
            'status' => 'required'
        ]);
    }
}
