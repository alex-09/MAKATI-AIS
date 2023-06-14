<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor\Obligation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TRListFursController extends Controller
{
    public function list()
    {
        $list = DB::select('CALL tf_list_obli_rec()');
        return response()->json(['list' => $list]);
    }
}
