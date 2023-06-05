<?php

namespace App\Repositories\DocumentManagement\Outgoing\CheckTransaction;

use Carbon\Carbon;
use App\Models\CTReceiveChecks;
use App\Models\CheckTransacTransmitalCounter;

class OutgoingCheckTransacRepository
{
    public function transmital($request)
    {
        try {

            $date = Carbon::now()->format('Y');

            $table = CheckTransacTransmitalCounter::all();
            if ($table->isEmpty()) {
                $transmital = "PT-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
            } else {
                $lastId = CheckTransacTransmitalCounter::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transmital = "PT-" . $date . "-" . str_pad(++$botId, 5, '0', STR_PAD_LEFT);
            }

            CheckTransacTransmitalCounter::create(['check_transac_counter' => $transmital]);

            for ($i = 0; $i < count($request->transac_id); $i++) {

                $addTransmital = CTReceiveChecks::where('transaction_id_num', $request->transac_id[$i]);
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

            for ($i = 0; $i < count($request->transmital_no); $i++) {

                $addTransmital = CTReceiveChecks::where('og_transmital_no', $request->transmital_no[$i]);
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
