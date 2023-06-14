<?php

namespace App\Http\Controllers\BAT\TrustFund\ListTr;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListTRController extends Controller
{
    public function listforReview(){
        $list = DB::select('CALL tf_getforreview_processor()');
        return response()->json(['list' => $list]);
    }

    public function listApproved(){
        $list = DB::select('CALL tf_getapprove_processor()');
        return response()->json(['list' => $list]);
    }

    public function view(Request $request){
        $view = DB::select('CALL tf_gettr_infor(?,?)',array(
            $request->tf_type,
            $request->tf_id
        ));
        return response()->json(['list' => $view]);
    }
}
