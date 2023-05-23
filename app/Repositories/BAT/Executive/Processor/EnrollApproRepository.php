<?php

namespace App\Repositories\BAT\Executive\Processor;

use App\Models\Appropriation;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;
use App\Http\Requests\EnrollApproRequest;

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

        $aipcode = $request->program_code."-".$request->project_code."-".$request->activity_code;
        AppropriationDetails::create([
            'appro_id' => $appro_id, 
            'AIPCode' => $aipcode
        ] + $request->validated());

        AppropriationExpenses::create([
            'appro_id' => $appro_id, 
            'AIPCode' => $aipcode,
        ] + $request->validated());
        
        return response()->json([
            'status' => true,
            'message' => "Added Successfully!",
            'appro_id' => $appro_id,
            'aipcode' => $aipcode
        ]);
    }

    public function addExpenses($request){
        AppropriationExpenses::create([
            'appro_id' => $request->appro_id, 
            'AIPCode' => $request->aipcode,
        ] + $request->all());

        return response()->json([
            'status' => true,
            'message' => "Added Successfully!",
            'appro_id' => $request->appro_id,
            'aipcode' => $request->aipcode
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