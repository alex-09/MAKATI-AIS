<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Appropriation;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListAppropriationController extends Controller
{
    public function index(){

        $list = DB::select('CALL exec_list_appro()');

        return response()->json([
            'status' => true,
            'data' => $list
        ]);
    }

}
