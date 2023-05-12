<?php

namespace App\Repositories\BAT\Executive\Processor;

use App\Models\Program;
use App\Models\Project;
use App\Models\Activity;
use App\Models\Expenses;
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
            'budget_year_id' => $request->budget_year_id,
            'department_code_id' => $request->department_code_id,
            'fundSource_id' => $request->fundSource_id,
            'reference_document' => $request->reference_document,
            'approType_id' => $request->approType_id,
            'department_code_id' => $request->department_code_id,
        ]);

        // for ($i=0; $i < count($request->program); $i++){
        AppropriationDetails::create([
            'appro_id' => $appro_id, 
            'budget_year_id' => $request->budget_year_id,
            'department_code_id' => $request->department_code_id,
            'AIPCode' => $request->program_code."-".$request->project_code."-".$request->activity_code,
            'program' => $request->program,
            'program_code' => $request->program_code,
            'project' => $request->project,
            'project_code' => $request->project_code,
            'activity' => $request->activity,
            'activity_code' => $request->activity_code,
            'activity_description' => $request->activity_description,
            'appro_total' => $request->appro_total,
            'account_code' => $request->account_code,
            'account_name' => $request->account_name,
            'appro_amount' => $request->appro_amount
        ]);
        
        return response()->json([
            'status' => true,
            'message' => "Add program Successfully!",
        ]);

        // }

        // for ($i=0; $i < count($request->project); $i++){
        // Project::create([
        //     'appro_id' => $appro_id, 
        //     'budget_year_id' => $request->budget_year_id,
        //     'department_code_id' => $request->department_code_id,
        //     'AIPCode' => $request->program_code."-".$request->project_code,
        //     'program_code_id' => $request->program_code,
        //     'project' => $request->project,
        //     'project_code' => $request->project_code,
        //     'activity' => $request->activity,
        //     'activity_code' => $request->activity_code,
        //     'activity_description' => $request->activity_description,
        //     'appro_total' => $request->appro_total,
        //     'account_code' => $request->account_code,
        //     'account_name' => $request->account_name,
        //     'appro_amount' => $request->appro_amount
        // ]);
        // // }

        //         // for ($i=0; $i < count($request->activity); $i++){
        //  Activity::create([
        //     'appro_id' => $appro_id, 
        //     'budget_year_id' => $request->budget_year_id,
        //     'department_code_id' => $request->department_code_id,
        //     'AIPCode' => $request->program_code."-".$request->project_code."-".$request->activity_code,
        //     'program_code_id' => $request->program_code,
        //     'project_code_id' => $request->project_code,
        //     'activity' => $request->activity,
        //     'activity_code' => $request->activity_code,
        //     'activity_description' => $request->activity_description,
        //     'appro_total' => $request->appro_total,
        // ]);
        // // }

        // // for ($i=0; $i < count($request->account_name); $i++){
        // Expenses::create([
        //     'appro_id' => $appro_id, 
        //     'budget_year_id' => $request->budget_year_id,
        //     'department_code_id' => $request->department_code_id,
        //     'AIPCode' => $request->program_code."-".$request->project_code."-".$request->activity_code,
        //     'program_code_id' => $request->program_code,
        //     'project_code_id' => $request->project_code, 
        //     'activity_code_id' => $request->activity_code, 
        //     'account_code' => $request->account_code,
        //     'account_name' => $request->account_name,
        //     'appro_amount' => $request->appro_amount
        // ]);
        // // }
        
    }

}