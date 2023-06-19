<?php

namespace App\Repositories\BAT\TrustFund\UpdateObligation;

use App\Models\DMBudgetaryObligationsTransac;
use App\Models\TfObigation;
use App\Models\TfObligationDetatils;
use Illuminate\Support\Facades\DB;

class UpdateObligationRepository{

    public function search($id){

        $result = DB::select('call tf_search_furs(?)',array($id));
        return response()->json(['result' => $result]);
    }

    public function update($request){

        $update = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $update->update([   
            'type' => 'Update', 
            'status' => 'For Review', 
        ]);

        $update1 = TfObigation::where('tf_obli_id', $request->tf_obli_id);
        $update1->update([
            'furs_amount' => $request->furs_amount, 
            'type' => 'Update', 
            'status' => 'For Review', 
        ]);

        for($x=0; $x<count($request->latest_balance); $x++){
            $update2 = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id)
            ->where('tf_count_id', 'counter_'.$x);
            $update2->update([
                'type' => 'Update', 
                'latest_balance' => $request->latest_balance[$x], 
                'adjusted_obligation' => $request->adjusted_obligation[$x], 
                'remarks' => $request->remarks[$x], 
                'status' => 'For Review', 
            ]);
        }

        return response()->json(['message' => "Updated Successfully"]);
    }
}