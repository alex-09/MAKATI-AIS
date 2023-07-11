<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Allotment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListAllotmentController extends Controller
{
    public function list(){
        
        $data = DB::select('SELECT * FROM list_allotment');

        return response()->json([
            'status' => true,   
            'messge' => "Success",
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {

        $results = DB::table('list_allotment')
            ->select('*')
            ->where('AIPCode', 'like', "%$request->search%")
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
