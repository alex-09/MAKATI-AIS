<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\ReceivePayrollsAndAppointment;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DMPaymentAppointment;
use App\Http\Requests\DocumentManagement\Receiving\PayrollAndAppointment;

class PayrollsAndAppointmentController extends Controller
{
    public function payrollAppointment(PayrollAndAppointment $request){
    try{

        $date = Carbon::now()->format('Y-m');

        $table = DMPaymentAppointment::all();
        if($table->isEmpty()){
            $transac_id = "PA-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
        }else{
            $lastId = DMPaymentAppointment::latest('id')->select('id')->first();
            $botId = $lastId['id'];
            $transac_id = "PA-" . $date . "-" . str_pad(++$botId, 7, '0', STR_PAD_LEFT);
        }

        // $docuFile = time().'.'.$request->file('document')->getClientOriginalExtension();
        // $request->document->move(public_path('uploads'), $docuFile);

        $payeeinfo = DMPaymentAppointment::create([
            'transaction_id_no' => $transac_id,
            // "document" => $docuFile
            ] + $request->validated());
    
        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully saved under Transaction ID Number '.$transac_id,
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