<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment;

use App\Http\Controllers\Controller;
use App\Models\DMPaymentAppointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PayrollAppointmentReceivingController extends Controller
{
    public function list(){

        $listReceipt = DB::select('CALL get_dm_payroll_appointment()');

        return response()->json(['data' => $listReceipt]);
    }

    public function print(Request $request){

        $ids = implode(",", $request->id);
        $listReceipt = DB::select('CALL dm_get_pay_appoint(?)', array($ids));
        return response()->json(['data' => $listReceipt]);
    }
}
