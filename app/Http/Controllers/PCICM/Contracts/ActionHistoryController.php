<?php

namespace App\Http\Controllers\PCICM\Contracts;

use App\Http\Controllers\Controller;
use App\Models\ActionHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActionHistoryController extends Controller
{
    public function listActionHistory()
    {
        return response()->json(['data' => DB::select('SELECT * FROM view_action_histories_contracts_pcicm')]);
    }

    public function addEntryActionHistory(Request $request)
        {
            $data = $request->all();
            $result = ActionHistory::create($data);
            return response()->json([
                'message' => 'Your action history has been successfully saved.',
            ]);
        }

    public function printActionHistory(Request $request)
        {
            $actionHistory = DB::select('SELECT * FROM view_action_histories_contracts_pcicm');
            $pdf = PDF::loadView('print.action-history', ['actionHistory' => $actionHistory]);
            return $pdf->stream('action-history.pdf');
        }
}
