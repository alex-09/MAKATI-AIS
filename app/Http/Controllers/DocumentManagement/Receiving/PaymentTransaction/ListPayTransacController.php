<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\PaymentTransaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DmPaymentTransaction;

class ListPayTransacController extends Controller
{
    public function list(){
        return response()->json(['list' => DB::select('CALL get_pay_transac()')]);
    }

    public function print(Request $request){
        $data = DmPaymentTransaction::select('id', 'transac_id', 'payee_name', 'particulars', 'amount', 'current_bearer')
                                    ->whereIn('id', $request->id)
                                    ->get();

        return response()->json([
            'list' => $data
        ]);
    }
}
