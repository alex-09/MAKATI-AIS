<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PayeeEnrollment;

use Carbon\Carbon;
use App\Models\PEBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PayeeEnrollment\BusinessRequest;
use App\Models\ActionHistory;

class PEBusinessController extends Controller
{

    public function storeBusiness(BusinessRequest $request)
    {
        try {

            $date = Carbon::now()->format('Y-m');

            $table = PEBusiness::all();
            if($table->isEmpty()) {
                $payee_id = "PID-" . "BUS-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
            }else {
                $lastId = PEBusiness::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $payee_id = "PID-" . "BUS-" . $date . "-" . str_pad(++$botId, 7, '0', STR_PAD_LEFT);
            }

            $businessData = PEBusiness::create([
                'type_of_payee_id' => 'Business',
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
