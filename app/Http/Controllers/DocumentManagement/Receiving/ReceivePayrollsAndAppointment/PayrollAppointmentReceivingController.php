<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment;

use App\Http\Controllers\Controller;
use App\Models\DMPaymentAppointment;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DocumentManagement\Receiving\PayrollAndAppointment;
use Illuminate\Http\Request;

class PayrollAppointmentReceivingController extends Controller
{
    public function list(){

        $listReceipt = DMPaymentAppointment::select('id',
            DB::raw('DATE(created_at) AS Date'),
            'transaction_id_no',
            'transaction_type',
            'cafoa-obr',
            'caf',
            'personnel_number',
            'department',
            'payroll_type',
            'employment_type',
            'covered_from',
            'covered_to',
            'subject',
            'amount'
        )->get();

        return response()->json(['data' => $listReceipt]);
    }

    public function print(Request $request){

        $listReceipt = DMPaymentAppointment::select('id',
            DB::raw('DATE(created_at) AS Date'),
            'transaction_id_no',
            'transaction_type',
            'cafoa-obr',
            'caf',
            'personnel_number',
            'amount',
            'department',
            'employment_type',
            'payroll_type',
            'covered_from',
            'covered_to',
            'bearer_name',
        )->whereIn('id', $request->id)->get();

        return response()->json(['data' => $listReceipt]);
    }
}
