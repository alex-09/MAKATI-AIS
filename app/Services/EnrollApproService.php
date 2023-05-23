<?php 

namespace App\Services;

use App\Models\Program;
use App\Models\Project;
use App\Models\Activity;
use App\Models\Expenses;
use App\Models\Appropriation;
use App\Http\Requests\EnrollApproRequest;

class EnrollApproService 
{
    public function EnrollAppro(EnrollApproRequest $request){

        $getApproId = Appropriation::latest('id')->first();
        $approIdInc = $getApproId['id'];
        $approId = "APPRO_".$approIdInc;

        Appropriation::create([
            'appro_id' => $approId, 
        ] +
            $request->validated(),
        );
        
        return $this->addPrograms($request);
        
    }


    public function addPrograms(EnrollApproRequest $request){

        // for ($i=0; $i < count($request->program); $i++){
            Program::create([
                'appro_id' => $request->appro_id, 
                'AIPCode' => $request->program_code
            ] +
                $request->validated(),
            );

            return $this->addProjects($request);
        // }

    }


    public function addProjects($request){

        // for ($i=0; $i < count($request->project); $i++){
            Project::create([
                'appro_id' => $request->appro_id, 
                'AIPCode' => $request->program_code."-".$request->project_code,
                'program_code_id' => $request->program_code,
            ] +
                $request->validated(),
            );

            return $this->addActivity($request);
        // }

    }


    public function addActivity($request){

        // for ($i=0; $i < count($request->activity); $i++){
            Activity::create([
                'appro_id' => $request->appro_id, 
                'AIPCode' => $request->program_code."-".$request->project_code."-".$request->activity_code,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code
            ] +
                $request->validated(),
            );

            return $this->addExpenses($request);
        // }
    }


    public function addExpenses($request){

        // for ($i=0; $i < count($request->account_name); $i++){
            Expenses::create([
                'appro_id' => $request->appro_id, 
                'AIPCode' => $request->program_code."-".$request->project_code."-".$request->activity_code,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code, 
                'activity_code_id' => $request->activity_code, 
            ] +
                $request->validated(),
            );
        // }

        return response()->json([
            'message' => 'Appropriation Successfully Enrolled!'
        ]);
    }
    
    
}