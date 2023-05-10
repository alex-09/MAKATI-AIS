<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment;

use App\Http\Controllers\Controller;
use App\Models\DMPaymentAppointment;
use App\Http\Requests\DocumentManagement\Receiving\PayrollAndAppointment;
use Illuminate\Http\Request;

class PayrollsAndAppointmentController extends Controller
{
    public function payrollAppointment(PayrollAndAppointment $request){
    try{

        $payeeinfo = DMPaymentAppointment::create($request->validated());
    
        return response()->json([
            'status' => true,
            'message' => 'Successfully Enrolled',
            'data' => $payeeinfo
        ]);

    }catch (\Throwable $th){
        return response()->json([
            'status' => false,
            'message' => 'Something went Wrong',
            'error' => $th->getMessage()
        ]);
    }
        }
    }