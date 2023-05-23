<?php

namespace App\Repositories\BAT\TrustFund\DivisionHead;

use App\Models\DMBudgetaryObligationsTransac;
use App\Models\TfObigation;
use App\Models\TfObligationDetatils;


class ObligationDiviHeadRepository{

    public function toCA($request){

        $update = TfObigation::where('tf_obli_id', $request->tf_obli_id)->first();
        $update->update([
            "status" => "For Approval - CA"
        ]);
        $updated = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id);
        $updated->update([
            "status" => "For Approval - CA",
        ]);
        $updated = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $updated->update([
            "status" => "For Approval - CA"
        ]);

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - CA.']);
    }

    public function reject($request){

        $update = TfObigation::where('tf_obli_id', $request->tf_obli_id)->first();
        $update->update([
            "remarks" => $request->remarks,
            "status" => "Rejected - DH"
        ]);
        $updated = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Rejected - DH"
        ]);
        $updated = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Rejected - DH"
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);

    }
}