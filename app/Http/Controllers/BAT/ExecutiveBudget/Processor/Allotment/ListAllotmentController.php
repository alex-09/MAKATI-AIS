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
}
