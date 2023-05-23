<?php 

namespace App\Services;

use App\Models\Activity;
use App\Models\Expenses;
use App\Models\Appropriation;
use App\Http\Requests\UpdateApproRequest;

class EnrollApproService 
{
    public function UpdateAppropriation(UpdateApproRequest $request){

        $approRef = Appropriation::where('appro_id', $request->approId);
            
        $approRef->update([
            'supp_budget_num' => $request->supp_budget_num,
            'adjustment_type' => $request->adjustment_type,
        ]);

        $expRef = Expenses::where('appro_id', $request->approId)
                        ->where('account_code', $request->acc_code);

        $expRef->update([
            'appro_add' => $request->add,
            'appro_deduct' => $request->deduct
        ]);

        $actRef = Activity::where('appro_id', $request->approId)
                        ->where('activity_code', $request->act_code);

        $actRef->update([
            'appro_total' => $request->total_exp,
            'appro_total_add' => $request->total_add,
            'appro_total_deduct' => $request->total_deduct
        ]);

    }


    public function addActivity(UpdateApproRequest $request){

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
    }
    
    
}