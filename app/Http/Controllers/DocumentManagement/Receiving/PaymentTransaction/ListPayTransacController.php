<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListPayTransacController extends Controller
{
    public function list(){
        return response()->json(['list' => DB::select('CALL get_pay_transac()')]);
    }
}
