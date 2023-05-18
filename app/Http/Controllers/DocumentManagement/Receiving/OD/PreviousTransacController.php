<?php

namespace App\Http\Controllers\DocumentManagement\Receiving\OD;

use Illuminate\Http\Request;
use App\Models\DMODNewTransac;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentManagement\Receiving\ODPreviousTransac;

class PreviousTransacController extends Controller
{

    public function search(Request $request){
        try{
            $result = DMODNewTransac::select('transaction_id_no', 'particulars', 'date', 'fund_source', 
                                            'bearer_name', 'department_office', 'contact_no', 'email')
                                            ->where('transaction_id_no', $request->transaction_id_no)->first();

            return response()->json(['result' => $result]);

        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ]);
        }
    }
    public function update(ODPreviousTransac $request){
        try{

            $update = DMODNewTransac::where('transaction_id_no', $request->transaction_id_no)->first();
            $update->update($request->all());
        
            return response()->json([
                'status' => true,
                'message' => 'Your entry has been successfully saved under the same Transaction ID Number.',
                'data' => $update
            ]);
    
        }catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => 'Something went Wrong',
                'error' => $th->getMessage()
            ]);
        }
            }
}
