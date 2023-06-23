<?php

namespace App\Repositories\BAT\TrustFund\Reviewer;

use App\Models\DonationPrivateSector;
use App\Models\LGUCounterpart;
use App\Models\tfFundDetails;
use App\Models\TransferFromOtherGovernmentAgencies;
use App\Models\UnexpendedBalance;

class ReviewerRepository{

    private function updateFundDet($request, $update){

        $update->update([
            "remarks" => $request->remarks,
            "status" => "For Approval - DH"
        ]);

        $updated = tfFundDetails::where('tf_id', $request->tf_id);
        $updated->update([
            "reviewer" => "qwerty",
            "status" => "For Approval - DH",
            "reviewer" => $request->reviewer
        ]);

        return response()->json(['message' => 'This entry has been successfully added. The account has been subject for Approval - DH.']);
    }

    public function toDiviHead($request){

        if("Transfer from Other Government Agencies" == $request->tf_type){

            $update = TransferFromOtherGovernmentAgencies::where('tf_id', $request->tf_id)->first();
            return $this->updateFundDet($request, $update);
        }
        else if("Donation from Private Sector" == $request->tf_type){

            $update = DonationPrivateSector::where('tf_id', $request->tf_id)->first();
            return $this->updateFundDet($request, $update);
        } 
        else if("Unexpended Balance of LDRRMF" == $request->tf_type){

            $update = UnexpendedBalance::where('tf_id', $request->tf_id)->first();
            return $this->updateFundDet($request, $update);
        }
        else if("LGU Counterpart Contribution for Specific Projects" == $request->tf_type){

            $update = LGUCounterpart::where('tf_id', $request->tf_id)->first();
            return $this->updateFundDet($request, $update);
        }
    }

    private function rejected($request, $update){

        $update->update([
            "remarks" => $request->remarks,
            "status" => "Rejected - Rev"
        ]);

        $updated = tfFundDetails::where('tf_id', $request->tf_id);
        $updated->update([
            "reviewer" => "qwerty",
            "status" => "Rejected - Rev"
        ]);

        return response()->json(['message' => 'The account has been Rejected.']);
    }

    public function reject($request){

        if("Transfer from Other Government Agencies" == $request->tf_type){

            $update = TransferFromOtherGovernmentAgencies::where('tf_id', $request->tf_id)->first();
            return $this->rejected($request, $update);
        }
        else if("Donation from Private Sector" == $request->tf_type){

            $update = DonationPrivateSector::where('tf_id', $request->tf_id)->first();
            return $this->rejected($request, $update);
        } 
        else if("Unexpended Balance of LDRRMF" == $request->tf_type){

            $update = UnexpendedBalance::where('tf_id', $request->tf_id)->first();
            return $this->rejected($request, $update);
        }
        else if("LGU Counterpart Contribution for Specific Projects" == $request->tf_type){

            $update = LGUCounterpart::where('tf_id', $request->tf_id)->first();
            return $this->rejected($request, $update);
        }

    }
}