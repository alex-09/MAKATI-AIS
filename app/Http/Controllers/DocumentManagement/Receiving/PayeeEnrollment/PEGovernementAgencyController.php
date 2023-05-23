<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ActionHistory;
use App\Models\PEGovernmentAgency;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayeeEnrollment\GovAgencyRequest;

class PEGovernementAgencyController extends Controller
{

    public function storeAgency(GovAgencyRequest $request)
    {
        try {

            $date = Carbon::now()->format('Y-m');

            $table = PEGovernmentAgency::all();
            if($table->isEmpty()) {
                $payee_id = "PID-" . "GOV-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
            }else {
                $lastId = PEGovernmentAgency::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $payee_id = "PID-" . "GOV-" . $date . "-" . str_pad(++$botId, 7, '0', STR_PAD_LEFT);
            }

            $agencyData = PEGovernmentAgency::create([
                'type_of_payee_id' => 'Government',
                'payee_id' => $payee_id
            ] + $request->validated());

            ActionHistory::create([
                'type_id' => $payee_id,
                'type' => 'Payee Enrollment',
                'particulars' => 'Enroll Payee',
                'user' => $request->user
            ]);

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
