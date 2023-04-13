<?php

namespace App\Http\Controllers\Appropriation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Activity;

class ListAppropriationController extends Controller
{
    public function index(){

        $list = DB::select('CALL listappropriation()');

        return response()->json([
            'status' => true,
            'message' => 'Show List',
            'data' => $list
        ]);
    }

}
