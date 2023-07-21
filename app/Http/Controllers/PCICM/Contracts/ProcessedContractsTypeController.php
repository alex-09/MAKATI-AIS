<?php

namespace App\Http\Controllers\PCICM\Contracts;

use App\Http\Controllers\Controller;
use App\Models\PCICMProcessedContracts;
use App\Models\PCICMContractTypeGFO;
use App\Models\PCICMContractTypeOSLaborComponent;
use App\Models\PCICMContractTypeOSSuppliesComponent;
use Illuminate\Http\Request;

class ProcessedContractsTypeController extends Controller
{
    public function enterContractDetailsDataEntry(Request $request)
    {
        try {
            $data = PCICMProcessedContracts::where('transaction_id', $request->transaction_id)->first();
            $contractType = $data->contract_type;

            if ($contractType === 'goods' || $contractType === 'framework-agreement' || $contractType === 'ordering-agreement') {
                foreach ($request->contract_entry as $contract_entry) {
                    PCICMContractTypeGFO::create([
                        'transaction_id' => $data->transaction_id,
                        'payee_name' => $data->payee_name,
                        'contract_date' => $data->contract_date,
                        'contract_number' => $data->contract_number,
                        'stock_property_number' => $contract_entry['stock_property_number'],
                        'unit' => $contract_entry['unit'],
                        'description' => $contract_entry['description'],
                        'brand' => $contract_entry['brand'],
                        'quantity' => $contract_entry['quantity'],
                        'unit_cost' => $contract_entry['unit_cost'],
                        'total_cost' => $contract_entry['total_cost'],
                        'contract_entry_type' => $contractType,
                    ]);
                }
            } else if ($contractType === 'consultancy' || $contractType === 'infrastructure') {
                foreach ($request->contract_entry as $contract_entry) {
                    PCICMContractTypeCI::create([
                        'transaction_id' => $request->transaction_id,
                        'payee_name' => $data->payee_name,
                        'contract_date' => $data->contract_date,
                        'contract_number' => $data->contract_number,
                        'item_number' => $contract_entry['item_number'],
                        'scope_of_works' => $contract_entry['scope_of_works'],
                        'amount_programmed' => $contract_entry['amount_programmed'],
                        'percentage_programmed' => $contract_entry['percentage_programmed'],
                        'contract_entry_type' => $contractType,
                    ]);
                } 
            }

            if ($contractType === 'services' || $contractType === 'others') {
                foreach ($request->contract_entry_labor as $contract_entry) {
                    $dataEntryLabor = PCICMContractTypeOSLaborComponent::create([
                        'transaction_id' => $data->transaction_id,
                        'payee_name' => $data->payee_name,
                        'contract_date' => $data->contract_date,
                        'contract_number' => $data->contract_number,
                        'item_number' => $contract_entry['item_number'],
                        'unit' => $contract_entry['unit'],
                        'quantity' => $contract_entry['quantity'],
                        'description' => $contract_entry['description'],
                        'rate_per_period' => $contract_entry['rate_per_period'],
                        'total_cost_per_period' => $contract_entry['total_cost_per_period'],
                        'number_of_period' => $contract_entry['number_of_period'],
                        'total_cost' => $contract_entry['total_cost'],
                        'contract_entry_type' => $contractType,
                    ]);
                }

                foreach ($request->contract_entry_supplies as $contract_entry) {
                    $dataEntrySupplies = PCICMContractTypeOSSuppliesComponent::create([
                        'transaction_id' => $data->transaction_id,
                        'payee_name' => $data->payee_name,
                        'contract_date' => $data->contract_date,
                        'contract_number' => $data->contract_number,
                        'stock_property_number' => $contract_entry['stock_property_number'],
                        'unit' => $contract_entry['unit'],
                        'description' => $contract_entry['description'],
                        'brand' => $contract_entry['brand'],
                        'quantity' => $contract_entry['quantity'],
                        'unit_cost' => $contract_entry['unit_cost'],
                        'total_cost' => $contract_entry['total_cost'],
                        'contract_entry_type' => $contractType,
                    ]);
                }
            }

            return response()->json([
                'message' => 'Your contract detail entries have been successfully saved.',
                'type' => $contractType,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong.',
                'error' => $th->getMessage(),
            ]);
        }
    }
}