<?php

namespace App\Http\Controllers\BAT\TrustFund;

use App\Http\Controllers\Controller;
use App\Models\SRCTrustReceipt;
use Illuminate\Http\Request;

class ListTRController extends Controller
{
    public function list(){
        return response()->json([
            'list' => SRCTrustReceipt::select('id', 'str_name')->get()
        ]);
    }
}
