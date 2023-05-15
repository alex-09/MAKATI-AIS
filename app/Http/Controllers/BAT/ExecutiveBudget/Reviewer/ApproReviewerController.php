<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Reviewer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApproReviewerController extends Controller
{
    public function list(){

        return response()->json(['list' => DB::select('CALL get_appro_for_review()')]);
    }

    public function view($id, $aipcode){

        $data = DB::select('CALL exec_view_appro(?,?)', array($id, $aipcode));

        return response()->json(['data' => $data]);
    }
}
