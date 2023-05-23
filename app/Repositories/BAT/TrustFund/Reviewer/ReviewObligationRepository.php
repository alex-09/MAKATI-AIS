<?php

namespace App\Repositories\BAT\TrustFund\Reviewer;

use App\Models\DMBudgetaryObligationsTransac;
use App\Models\TfObigation;
use App\Models\TfObligationDetatils;


class ReviewObligationRepository{

    public function toDiviHead($request){

        $update = TfObigation::where('tf_obli_id', $request->tf_obli_id)->first();
        $update->update([
            "reviewer" => "Name of Account Logged in",
            "status" => "For Approval - DH"
        ]);
        $updated = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id);
        $updated->update([
            "status" => "For Approval - DH",
        ]);
        $updated = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $updated->update([
            "reviewer" => "Name of Account Logged in",
            "status" => "For Approval - DH"
        ]);

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - DH.']);
    }

    public function reject($request){

        $update = TfObigation::where('tf_obli_id', $request->tf_obli_id)->first();
        $update->update([
            "reviewer" => "Name of Account Logged in",
            "remarks" => $request->remarks,
            "status" => "Rejected - Rev"
        ]);
        $updated = TfObligationDetatils::where('tf_obli_id', $request->tf_obli_id);
        $updated->update([
            "status" => "Rejected - Rev"
        ]);
        $updated = DMBudgetaryObligationsTransac::where('furs_id', $request->tf_obli_id);
        $updated->update([
            "reviewer" => "Name of Account Logged in",
            "status" => "Rejected - Rev"
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);

    }
}