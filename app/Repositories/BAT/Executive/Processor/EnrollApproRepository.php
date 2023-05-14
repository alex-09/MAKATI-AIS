<?php

namespace App\Repositories\BAT\Executive\Processor;

use App\Models\Appropriation;
use App\Http\Requests\EnrollApproRequest;
use App\Models\AppropriationDetails;

class EnrollApproRepository{

    public function EnrollAppro(EnrollApproRequest $request){

        $getApproId = Appropriation::all();
        if($getApproId->isEmpty()){
            $appro_id = "appro_"."1";
        }else{
            $getApproId = Appropriation::latest('id')->first();
            $approIdInc = $getApproId['id'];
            $appro_id = "appro_".++$approIdInc;
        }

        Appropriation::create([
            'appro_id' => $appro_id,
        ] + $request->validated());

        for ($i=0; $i < count($request->program); $i++){
            for ($x=$i; $x < count($request->project); $x++){
                AppropriationDetails::create([
                    'appro_id' => $appro_id, 
                    'budget_year_id' => $request->budget_year_id,
                    'department_code_id' => $request->department_code_id,
                    'AIPCode' => $request->program_code[$i]."-".$request->project_code[$x]."-".$request->activity_code[$x],
                    'program' => $request->program[$i],
                    'program_code' => $request->program_code[$i],
                    'project' => $request->project[$x],
                    'project_code' => $request->project_code[$x],
                    'activity' => $request->activity[$x],
                    'activity_code' => $request->activity_code[$i][$x],
                    'activity_description' => $request->activity_description[$x],
                    'appro_total' => $request->appro_total[$x],
                    'latest_appro_total' => $request->appro_total[$x],
                    'account_code' => $request->account_code[$x],
                    'account_name' => $request->account_name[$x],
                    'appro_amount' => $request->appro_amount[$x],
                    'latest_appro_amount' => $request->appro_amount[$x]   
                ]);
            }
        }
        
        return response()->json([
            'status' => true,
            'message' => "Add program Successfully!",
            'appro_id' => $appro_id
        ]);
        
    }

    public function forReview($request){
        Appropriation::where('appro_id', $request->appro_id)->update(['status' => 'For Review']);

        return response()->json([
            'status' => true,
            'message' => 'Your entry has been successfully added. The account has been subject for Review.',
        ], 200);

    }

}