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

        foreach($request->mainProgramForms as $mainProgForms){
            $progForm = $mainProgForms['programForms'];
            foreach($progForm as $progForms){
                $projectForm = $progForms['projectForms'];
                foreach($projectForm as $projectForms){
                    $activityForm = $projectForms['activityForms'];
                    foreach($activityForm as $activityForms){
                        $expenses = $activityForms['expensesClassifications'];
                        foreach($expenses as $expensesdetails){
                            
                            $aipcode = $projectForms['program_code']."-".$projectForms['project_code']."-".$activityForms['activity_code']; 

                            AppropriationDetails::create([
                                'appro_id' => $appro_id, 
                                'AIPCode' => $aipcode,
                                'department_code_id' => $request->department_code_id,
                                'budget_year_id' => $request->budget_year_id,
                                'program_code' => $progForms['request->program_code'],
                                'program' => $progForms['program'],
                                'project_code' => $projectForms['project_code'],
                                'project' => $projectForms['project'],
                                'activity_code'=> $activityForms['activity_code'],
                                'activity' => $activityForms['activity'],
                                'activity_description' => $activityForms['activity_description'],
                                'appro_total' => $expensesdetails['appro_total'],
                                'latest_appro_total' => $expensesdetails['appro_total'],
                            ]);

                            AppropriationExpenses::create([
                                'appro_id' => $appro_id, 
                                'AIPCode' => $aipcode,
                                'account_name' => $expensesdetails['account_name'],
                                'account_code' => $expensesdetails['account_code'],
                                'appro_amout' => $expensesdetails['appro_amout'],
                                'latest_appro_amount' => $expensesdetails['latest_appro_amount'],

                            ] + $request->validated());
                        
                        }
                    }
                }
            }
        }
        
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