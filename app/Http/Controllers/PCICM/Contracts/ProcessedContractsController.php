<?php

namespace App\Http\Controllers\PCICM\Contracts;

use App\Http\Controllers\Controller;
use App\Models\PCICMProcessedContracts;
use App\Models\PCICMProcessedContractsDeliveryTerm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProcessedContractsController extends Controller
{
    public function listProcessedDivisionHead() //division head
    {
        return response()->json(['data' => DB::select('SELECT * FROM view_processed_contracts_pcicm WHERE status = 2')]);
    }
    public function listProcessedCityAccountant() //city accountant
    {
        return response()->json(['data' => DB::select('SELECT * FROM view_processed_contracts_pcicm WHERE status = 1')]);
    }

    public function enterContractDetails(Request $request){
        try{
            $data = $request->all();
            $result = PCICMProcessedContracts::create($data);

            foreach ($request->delivery_terms as $delivery_terms)
                $deliveryTermsRows = PCICMProcessedContractsDeliveryTerm::create([
                    'transaction_id' => $request->transaction_id,
                    'particulars' => $delivery_terms['particulars'],
                    'delivery_term' => $delivery_terms['delivery_term'],
                    'due_date' => $delivery_terms['due_date']
                ]);

            return response()->json([
                'message' => 'Your contract details have been successfully saved.',
            ]);
        }catch (\Throwable $th){
            return response()->json([
                'message' => 'Something went wrong.',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function saveForApproval($transaction_id){
        try{
            $data = DMContractpo::where('transaction_id', $transaction_id)->update([
                'status' => 2 //divisionhead
            ]);
            return response()->json([
                'message' => 'Your contract is now saved for approval.',
            ]);
        }catch (\Throwable $th){
            return response()->json([
                'message' => 'Something went wrong.',
                'error' => $th->getMessage()
            ]);
        }
    }
}
