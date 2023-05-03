<?php

namespace App\Repositories\DocumentManagement\Receiving\PaymentTransaction;

use Carbon\Carbon;
use App\Models\DmContractpo;
use App\Models\DmPaymentTransaction;

class NewPayTransacRepository
{
    public function storetransac($request){

        // $payee = Payee::where('payee_name', $request->payee_name)->first();
        // if($payee == null){

        //     return response()->json([
        //         'message' => 'Payee has not been enrolled yet. Proceed to Payee Enrollment page?'
        //     ]);
        // }else{
        
        // }

        $date = Carbon::now()->format('Y-M');

        $table = DmPaymentTransaction::all();
        if($table->isEmpty()){
            $transac_id = "PT-" . $date . "-" . str_pad(1, 7, '0', STR_PAD_LEFT);
        }else{
            $lastId = DmPaymentTransaction::latest('id')->select('id')->first();
        $ptId = $lastId['id'];
            $transac_id = "PT-" . $date . "-" . str_pad(++$ptId, 7, '0', STR_PAD_LEFT);
        }
    
        DmPaymentTransaction::create([
            'transaction_id' => $transac_id, 
            'status' => 1
        ] + $request->validated());
    
        return response()->json([
            'message' => 'Your entry has been successfully saved under Transaction ID Number ' . $transac_id
        ], 200);
    }
}