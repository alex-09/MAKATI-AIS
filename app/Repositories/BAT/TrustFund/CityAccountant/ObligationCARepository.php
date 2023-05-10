<?php

namespace App\Repositories\BAT\TrustFund\CityAccountant;

use App\Models\TfObigation;
use App\Models\TfObligationDetatils;
use App\Models\DMBudgetaryObligationsTransac;

class ObligationCARepository{

    public function toAprrove($request){

        $update = TfObigation::where('tf_obli_id', $request->tf_obli_id)->first();
        $update->update([
            "status" => "Approved"
        ]);
        $updated = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Approved",
        ]);
        $updated = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Approved"
        ]);

        return response()->json(['message' => 'The account has been successfully Approved.']);
    }

    public function reject($request){

        $update = TfObigation::where('tf_obli_id', $request->tf_obli_id)->first();
        $update->update([
            "remarks" => $request->remarks,
            "status" => "Rejected - CA"
        ]);
        $updated = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Rejected - CA"
        ]);
        $updated = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Rejected - CA"
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);

    }

}