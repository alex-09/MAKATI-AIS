<?php

namespace App\Http\Controllers\BAT\TrustFund\Processor;

use App\Http\Controllers\Controller;
use App\Models\SRCTrustReceipt;
use Illuminate\Http\Request;

class ListsrcTRController extends Controller
{
    public function list(){
        return response()->json([
            'list' => SRCTrustReceipt::select('id', 'str_name')->get()
        ]);
    }
}
