<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Obligation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    
}
