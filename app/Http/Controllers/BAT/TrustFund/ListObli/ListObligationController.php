<?php

namespace App\Http\Controllers\BAT\TrustFund\ListObli;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListObligationController extends Controller
{
    public function listforReview(){
        $list = DB::select('CALL tf_list_obli_rec()');
        return response()->json(['list' => $list]);
    }

    public function listApproved(){
        $list = DB::select('CALL tf_list_obli_approve()');
        return response()->json(['list' => $list]);
    }

    public function view($id){
        $view = DB::select('CALL tf_viewObligation(?)',array($id));
        return response()->json(['list' => $view]);
    }
}
