<?php

namespace App\Repositories\BAT\TrustFund\UpdateTrustReceipts;

use App\Models\tfFundDetails;
use Illuminate\Support\Facades\DB;

class UpdateTRRepository{

    public function search($request){

        $result = DB::select('call tf_update_tr(?,?)',array(
            $request->id,
            $request->main_title
        ));

        return response()->json(['result' => $result]);
    }

    public function update($request){
        
        $update = tfFundDetails::where('id', $request->id)->first();
        $update->update([
            'reference' => $request->reference, 
            'update_reasons' => $request->update_reasons, 
            'latest_balance' => $request->updated_balance, 
            'addition' => $request->addition, 
            'deduction' => $request->deduction, 
            'updated_balance' => $request->updated_balance,
            'type' => "Update"
        ]);

        return response()->json(['message' => "Updated Successfully"]);
    }
}