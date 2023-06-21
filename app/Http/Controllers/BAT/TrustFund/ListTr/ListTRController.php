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
        $info = DB::select('CALL tf_gettr_infor(?,?)',array(
                    $request->tf_type,
                    $request->tf_id
                ));

        $info2 = DB::select('CALL tf_gettr_infor2(?)',array(
                    $request->tf_id
                ));

        return response()->json([
            'list' => $info,
            'list2' => $info2]);
    }

    public function searchOnProcess(Request $request){
        try{
            $list = DB::select('CALL tf_search_tr_on_process(?)',array(
                $request->tf_type,
            ));
            return response()->json(['list' => $list]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }

    public function searchApproved(Request $request){
        try{
            $list = DB::select('CALL tf_search_tr_approved(?)',array(
                $request->tf_type,
            ));
            return response()->json(['list' => $list]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
}
