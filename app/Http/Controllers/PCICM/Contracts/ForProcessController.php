<?php

namespace App\Http\Controllers\PCICM\Contracts;

use App\Http\Controllers\Controller;
use App\Models\DmContractpo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ForProcessController extends Controller
{
    public function listForProcessProcessor() //processor
    {
        return response()->json(['data' => DB::select('SELECT * FROM view_for_process_contracts_pcicm WHERE status = 3')]);
    }

    public function listForProcessDivisionHead() //division head
    {
        return response()->json(['data' => DB::select('SELECT * FROM view_for_process_contracts_pcicm WHERE status = 2')]);
    }

    public function listForProcessCityAccountant() //city accountant
    {
        return response()->json(['data' => DB::select('SELECT * FROM view_for_process_contracts_pcicm WHERE status = 1')]);
    }

    public function viewForProcess($transaction_id) //buttonP
    {
        $view = DMContractpo::where('transaction_id', $transaction_id)->get();
        return response()->json([
            'message' => 'Transaction found.',
            'data' => $view
        ]);
    }

    private function searchQuery($query, Request $request) {
        if ($request->has('date')) {
            $formatdate = Carbon::createFromFormat('m-d-Y', $request->date)->toDateString();
            $query->where('created_at', 'LIKE', '%' . $formatdate . '%');
        }

        if ($request->has('tr_id')) {
            $query->where('transaction_id', $request->tr_id);
        }

        if ($request->has('payee')) {
            $query->where('payee_name', 'LIKE', '%' . $request->payee . '%');
        }

        if ($request->has('co_num')) {
            $query->where('contract_no', $request->co_num);
        }

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        return $query->get();
    }

    public function searchForProcessProcessor(Request $request)
    {
        $query = DMContractpo::query();
        $result = $this->searchQuery($query, $request);
        return response()->json(['result' => $result]);
    }
    
    public function searchForProcessDHCA(Request $request)
    {
        $query = PCICMProcessedContracts::query();
        $result = $this->searchQuery($query, $request);
        return response()->json(['result' => $result]);
    }

    public function updateForProcessProcessor(Request $request){
        try{
            $update = DMContractpo::where('transaction_id', $request->$transaction_id)->update([
                'assign_to' => $request->assign_to, 
                'status' => $request->status
            ]);

            return response()->json([
                'message' => 'Your entry has been successfully updated under the same Transaction ID Number.',
            ]);
    
        } catch (\Throwable $th){
            return response()->json([
                'message' => 'Something went wrong.',
                'error' => $th->getMessage()
            ]);
        }
    }
}
