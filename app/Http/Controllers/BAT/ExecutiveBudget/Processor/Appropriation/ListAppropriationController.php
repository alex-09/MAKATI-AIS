<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Appropriation;

use Illuminate\Http\Request;
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

    public function view(Request $request){

        $mainInfo = DB::select('CALL exec_appro_update_report_info(?,?)',array(
            $request->aipcode,
            $request->appro_id
         ));

         $expenses = DB::select('call exec_appro_getinfo(?,?)',array(
            $request->aipcode,
            $request->appro_id
        ));

        return response()->json([
            'status' => true,
            'main-info' => $mainInfo,
            'expenses' => $expenses
        ]);

    }

}
