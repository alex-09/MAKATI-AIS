<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Obligation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExecObligationDetails;

class ListObligationController extends Controller
{
    public function forProcess(){
        $list = DB::select('SELECT * FROM exec_obligation_list');

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'list' => $list
        ]);
    }

    public function listObligation(){
        $list = DB::select('SELECT * FROM list_obligation_view');

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'list' => $list
        ]);
    }

    public function search(Request $request)
    {

        $results = ExecObligationDetails::where('AIPCode', 'like', "%$request->search%")
            ->orWhere('program', 'like', "%$request->search%")
            ->orWhere('project', 'like', "%$request->search%")
            ->orWhere('activity', 'like', "%$request->search%")
            ->get();

        return response()->json([
            'status' => true,
            'result' => $results
        ]);
    }

    
}
