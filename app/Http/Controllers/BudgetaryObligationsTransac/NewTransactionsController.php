<?php

namespace App\Http\Controllers\BudgetaryObligationsTransac;

use App\Http\Controllers\Controller;
use App\Models\DMBudgetaryObligationsTransac;
use Illuminate\Http\Request;

class NewTransactionsController extends Controller
{

    public function insertNewTransac(Request $request){

try{

    $request->validate([





     ]);

     
    $insertNew = DMBudgetaryObligationsTransac::create([

    'docu_type_id'=>$request->docu_type_id,
    'transaction_id'=>$request->transaction_id,
    'department'=>$request->department,
    'processing_slip_number'=>$request->processing_slip_number,
    'description'=>$request->description,
    'amount'=>$request->amount,
    'current_bearer'=>$request->current_bearer,
    'current_bearer_dept'=>$request->current_bearer_dept,
    'current_bearer_contact_number'=>$request->current_bearer_contact_number,
    'current_bearer_email'=>$request->current_bearer_email,
    'status'=>$request->status


    ]);

}catch (\Throwable $th){
    return response()->json([
        'status' => false,
        'message' => 'Something went wrong',
        'error' => $th->getMessage()
    ]);
}
    
}
}

