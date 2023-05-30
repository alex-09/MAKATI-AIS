<?php

namespace App\Repositories\DocumentManagement\Outgoing\BOT;

use Carbon\Carbon;
use App\Models\DmBotTransmitalCounter;
use App\Models\DMBudgetaryObligationsTransac;

class OutgoingBotRepository
{
    public function transmital($request)
    {
        try {

            $date = Carbon::now()->format('Y');

            $table = DmBotTransmitalCounter::all();
            if ($table->isEmpty()) {
                $transmital = "COM-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
            } else {
                $lastId = DmBotTransmitalCounter::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transmital = "COM-" . $date . "-" . str_pad(++$botId, 5, '0', STR_PAD_LEFT);
            }

            DmBotTransmitalCounter::create(['com_transmital' => $transmital]);

            for ($i = 0; $i < count($request->transac_id); $i++) {

                $addTransmital = DMBudgetaryObligationsTransac::where('transaction_id_num', $request->transac_id[$i]);
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

                $addTransmital = DMBudgetaryObligationsTransac::where('transaction_id_num', $request->transac_id[$i]);
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
