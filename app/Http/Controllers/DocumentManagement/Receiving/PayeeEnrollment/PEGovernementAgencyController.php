<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use Illuminate\Http\Request;
use App\Models\PEGovernmentAgency;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayeeEnrollment\GovAgencyRequest;

class PEGovernementAgencyController extends Controller
{

    public function storeAgency(GovAgencyRequest $request)
    {
        try {
            $agencyData = PEGovernmentAgency::create([
                'type_of_payee_id' => 'Government'
            ] + $request->validated());

            return response()->json([
                'status' => true,
                'message' => 'Successfully Enrolled',
                'data' => $agencyData,
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
