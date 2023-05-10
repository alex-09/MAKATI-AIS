<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment;

use App\Http\Controllers\Controller;
use App\Models\DMPaymentAppointment;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DocumentManagement\Receiving\PayrollAndAppointment;
use Illuminate\Http\Request;

class PayrollAppointmentReceivingController extends Controller
{
    public function payrollListReceiving(){

        $listReceipt = DMPaymentAppointment::select(
            DB::raw('DATE(created_at) AS Date'),
            'transaction_id_no',
            'transaction_type',
            'cafoa-obr',
            'caf',
            'personnel_number',
            'department',
            'amount'
        )->get();

        return response()->json(['data' => $listReceipt]);
    }
}
