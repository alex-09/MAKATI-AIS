<?php

namespace App\Repositories\DocumentManagement\Outgoing\Communications;

use Carbon\Carbon;
use App\Models\CreateCommunication;
use App\Models\ReceiveCommunications;
use App\Models\DmComTransmitalCounter;

class OutgoingCommRepository
{
    public function searchMc()
    {
        try {
            return response()->json(['data' => CreateCommunication::all()]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function update($request)
    {
        try {

            $update = CreateCommunication::where('transac_id', $request->mc_no);
            $update->update($request->all());

            return response()->json(['message' => 'Your entry has been successfully saved.']);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => true,
                'message' => 'Something went wrong!',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function transmital($request)
    {
        try {

            $date = Carbon::now()->format('Y');

            $table = DmComTransmitalCounter::all();
            if ($table->isEmpty()) {
                $transmital = "COM-" . $date . "-" . str_pad(1, 5, '0', STR_PAD_LEFT);
            } else {
                $lastId = DmComTransmitalCounter::latest('id')->select('id')->first();
                $botId = $lastId['id'];
                $transmital = "COM-" . $date . "-" . str_pad(++$botId, 5, '0', STR_PAD_LEFT);
            }

            DmComTransmitalCounter::create(['com_transmital' => $transmital]);

            for ($i = 0; $i < count($request->transac_id); $i++) {
                if (substr($request->transac_id[$i], 0, 3) == "COM") {
                    $addTransmital = ReceiveCommunications::where('transaction_id_num', $request->transac_id[$i]);
                    $addTransmital->update(['og_transmital_no' => $transmital]);
                } else {
                    $addTransmital = CreateCommunication::where('transac_id', $request->transac_id[$i]);
                    $addTransmital->update(['og_transmital_no' => $transmital]);
                }
            }

            return response()->json([
                'message' => 'Your entry has been successfully saved under Transmittal ID Number ' . $transmital,
                'transmittal' => $transmital
            ]);
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

            foreach($request->transac as $transacID) {
                $transac = $transacID['transac_id'];
                foreach($transac as $id) {
                    if (substr($id['transac_id'], 0, 3) == "COM") {
                        $addTransmital = ReceiveCommunications::where('og_transmital_no', $transacID['transmital_no'])
                        ->where('transaction_id_num', $id['transac_id']);
                        $addTransmital->update([
                            'og_sender' => $transacID['og_sender'],
                            'og_received_by' => $transacID['og_received_by'],
                            'og_date' => $transacID['og_date']
                        ]);
                    } else {
                        $addTransmital = CreateCommunication::where('og_transmital_no', $transacID['transmital_no'])
                        ->where('transac_id', $id['transac_id']);
                        $addTransmital->update([
                            'og_sender' => $transacID['og_sender'],
                            'og_received_by' => $transacID['og_received_by'],
                            'og_date' => $transacID['og_date']
                        ]);
                    }
                }
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

    public function uploadDocument($request){

        $docuFile = $request->transac_id.'.'.$request->file('document')->getClientOriginalExtension();
        $request->document->move(public_path('Document/DocumentManagement/Receiving/Communication/'), $docuFile);    

        if (substr($request->transac_id, 0, 3) == "COM") {
            $addTransmital = ReceiveCommunications::where('transaction_id_num', $request->transac_id);
            $addTransmital->update(['document' => $docuFile]);
        } else {
            $addTransmital = CreateCommunication::where('transac_id', $request->transac_id);
            $addTransmital->update(['document' => $docuFile]);
        }
    }
}
