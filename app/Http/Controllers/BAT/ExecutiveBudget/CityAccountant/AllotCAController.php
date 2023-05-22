<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\CityAccountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AllotCAController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('CALL get_allotment_list()')]);
    }
}
