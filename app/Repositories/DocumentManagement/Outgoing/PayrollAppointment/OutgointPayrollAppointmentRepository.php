<?php

namespace App\Repositories\DocumentManagement\Outgoing\PayrollAppointment;

use Carbon\Carbon;
use App\Models\DMPaymentAppointment;
use App\Models\DmPayrollAppointCounter;

class OutgointPayrollAppointmentRepository
{
    public function transmital($request)
    {
        try {
            $date = Carbon::now()->format('Y');

            $table = DmPayrollAppointCounter::all();
            if ($table->isEmpty()) {
                $transmital = "PA-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
            } else {
                $lastId = DmPayrollAppointCounter::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transmital = "PA-" . $date . "-" . str_pad(++$botId, 5, '0', STR_PAD_LEFT);
            }

            DmPayrollAppointCounter::create(['payrollApp_transmital' => $transmital]);

            for ($i = 0; $i < count($request->transac_id); $i++) {

                $addTransmital = DMPaymentAppointment::where('transaction_id_no', $request->transac_id[$i]);
                $addTransmital->update(['og_transmital_no' => $transmital]);
            }

            return response()->json(['message' => 'Your entry has been successfully saved under Transmittal ID Number ' . $transmital]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function updateOutgoing($request)
    {
        try {

            for ($i = 0; $i < count($request->transac_id); $i++) {

                $addTransmital = DMPaymentAppointment::where('transaction_id_no', $request->transac_id[$i]);
                $addTransmital->update([
                    'og_sender' => $request->og_sender,
                    'og_received_by' => $request->og_received_by,
                    'og_date' => $request->og_date
                ]);
            }

            return response()->json(['message' => 'Your entry has been successfully saved.']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }
}
