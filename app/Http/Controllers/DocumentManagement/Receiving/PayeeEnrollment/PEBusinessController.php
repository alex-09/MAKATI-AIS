<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use App\Models\PEBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayeeEnrollment\BusinessRequest;

class PEBusinessController extends Controller
{

    public function storeBusiness(BusinessRequest $request)
    {
        try {

            $businessData = PEBusiness::create([
                'type_of_payee_id' => 'Business'
            ] + $request->validated());

            return response()->json([
                'status' => true,
                'message' => 'Successfully Enrolled',
                'data' => $businessData,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
