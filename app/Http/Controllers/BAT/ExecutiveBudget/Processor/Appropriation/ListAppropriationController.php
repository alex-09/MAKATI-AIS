<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListAppropriationController extends Controller
{
    public function index(){

        $list = DB::select('SELECT * FROM exec_list_appropriation');

        return response()->json([
            'status' => true,
            'data' => $list
        ]);
    }

}
