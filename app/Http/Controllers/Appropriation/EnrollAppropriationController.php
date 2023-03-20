<?php

namespace App\Http\Controllers\Appropriation;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Appropriation;
use App\Models\Expenses;
use App\Models\Program;
use App\Models\Project;
use Illuminate\Http\Request;

class EnrollAppropriationController extends Controller
{

    //ENROLL NEW APPROPRIATION
    public function EnrollAppro(Request $request){

        try{

            // $enrollInfo = $request->validate([
            //     '' => [''],
            // ]);

            // $enrollDetails = Appropriation::create([

            //     'budget_year_id' => 1,
            //     'fund_source' => $request->fund_source,
            //     'reference_document' => $request->reference_document,
            //     'appropriation_type' => $request->appropriation_type,
            //     'department' => $request->department,
            //     'office_code' => $request->office_code,
            //     'status' => $request->status,

            // ]);
            // $enrollDetails->save();

            // $enrollProgram = Program::create([

            //     'department_id' => $request->department,
            //     'program' => $request->program,
            //     'program_code' => $request->program_code,

            // ]);
            // $enrollProgram->save();

            // $enrollProject = Project::create([

            //     // 'program' => $request->program,
            //     'project' => $request->project,
            //     'project_code' => $request->project_code,
                
            // ]);
            // $enrollProject->save();

            // $enrollActivity = Activity::create([

            //     // 'project' => $request->project,
            //     'activity' => $request->activity,
            //     'activity_code' => $request->activity_code,
            //     'activity_description' => $request->activity_description,
            //     'allotment' => 1,
            //     'expenses' => 1,
            //     'appropriation_amount' => 1,
            //     'balance' => 1,

            // ]);
            // $enrollActivity->save();

            $enrollExpenses = Expenses::create([

                'activity' => $request->activity,
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'allotment_amount' => $request->allotment_amount,
                'balance' => $request->balance,
                'addition' => $request->addition,
                'deduction' => $request->deduction,
                'adjusted_balance' => $request->adjusted_balance,

            ]);
            $enrollExpenses->save();

            return response()->json([
                'status' => true,
                'message' => "Insert data success!",
                'data' => $enrollExpenses,

            ]);

        } catch(\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()

            ]);
        }
    }
}
