<?php

namespace App\Repositories\BAT\Executive\Processor;

use App\Models\Appropriation;
use App\Models\AppropriationDetails;
use App\Models\AppropriationExpenses;
use App\Http\Requests\EnrollApproRequest;

class EnrollApproRepository{

    public function EnrollAppro($request){

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
        ] + $request->all());

        foreach($request->mainProgramForms as $mainProgForms){
            $progForm = $mainProgForms['programForms'];
                foreach ($progForm['projectForms'] as $projectForm) {
                    foreach ($projectForm['activityForms'] as $activityForm) {
                        foreach ($activityForm['expensesClassifications'] as $expenseClassification) {
                        
                            $aipcode = $progForm['program_code']."-".$projectForm['project_code']."-".$activityForm['activity_aip_code']; 

                            AppropriationDetails::create([
                                'appro_id' => $appro_id, 
                                'AIPCode' => $aipcode,
                                'department_code_id' => $request->department_code_id,
                                'budget_year_id' => $request->budget_year_id,
                                'program_code' => $progForm['program_code'],
                                'program' => $progForm['program'],
                                'project_code' => $projectForm['project_code'],
                                'project' => $projectForm['project'],
                                'activity_code'=> $activityForm['activity_aip_code'],
                                'activity' => $activityForm['activity'],
                                'activity_description' => $activityForm['activity_description'],
                                'appro_total' => $activityForm['expenseTotal'],
                                'latest_appro_total' => $activityForm['expenseTotal'],
                            ]);

                            AppropriationExpenses::create([
                                'appro_id' => $appro_id, 
                                'AIPCode' => $aipcode,
                                'account_name' => $expenseClassification['account_name'],
                                'account_code' => $expenseClassification['account_code'],
                                'appro_amount' => $expenseClassification['appro_amount'],
                                'latest_appro_amount' => $expenseClassification['appro_amount'],

                            ]);
                        
                        }
                    }
                }
        }
        
        return response()->json([
            'status' => true,
            'message' => "Added Successfully!",
            'appro_id' => $appro_id,
        ]);
    }

    public function addProgram($request){

        foreach($request->mainProgramForms as $mainProgForms){
            $progForm = $mainProgForms['programForms'];
                foreach ($progForm['projectForms'] as $projectForm) {
                    foreach ($projectForm['activityForms'] as $activityForm) {
                        foreach ($activityForm['expensesClassifications'] as $expenseClassification) {
                        
                            $aipcode = $progForm['program_code']."-".$projectForm['project_code']."-".$activityForm['activity_aip_code']; 

                            AppropriationDetails::create([
                                'appro_id' => $request->appro_id, 
                                'AIPCode' => $aipcode,
                                'department_code_id' => $request->department_code_id,
                                'budget_year_id' => $request->budget_year_id,
                                'program_code' => $progForm['program_code'],
                                'program' => $progForm['program'],
                                'project_code' => $projectForm['project_code'],
                                'project' => $projectForm['project'],
                                'activity_code'=> $activityForm['activity_aip_code'],
                                'activity' => $activityForm['activity'],
                                'activity_description' => $activityForm['activity_description'],
                                'appro_total' => $activityForm['expenseTotal'],
                                'latest_appro_total' => $activityForm['expenseTotal'],
                            ]);

                            AppropriationExpenses::create([
                                'appro_id' => $request->appro_id, 
                                'AIPCode' => $aipcode,
                                'account_name' => $expenseClassification['account_name'],
                                'account_code' => $expenseClassification['account_code'],
                                'appro_amount' => $expenseClassification['appro_amount'],
                                'latest_appro_amount' => $expenseClassification['appro_amount'],
                            ]);
                                
                        }
                    }
                }
        }

        return response()->json([
            'status' => true,
            'message' => "Added Successfully!",
            'appro_id' => $request->appro_id,
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