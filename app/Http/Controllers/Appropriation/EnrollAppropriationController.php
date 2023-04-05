<?php

namespace App\Http\Controllers\Appropriation;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Appropriation;
use App\Models\Expenses;
use App\Models\Program;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollAppropriationController extends Controller
{

    //RETRIEVE BUDGET YEAR LIST
    public function YearList(){

        $yearslist = DB::select('CALL budget_years()');

        return response()->json([

            'status' => True,
            'message' => 'fetch data successful',
            'data' => $yearslist
        ]);
    }

    public function ApproTypes(){
        $approtypes = DB::select('CALL types_of_appropriation()');

        return response()->json([

            'status' => True,
            'message' => 'fetch data successful',
            'data' => $approtypes
        ]);

    }

    //ENROLL NEW APPROPRIATION
    public function EnrollAppro(Request $request){

        try{

            $request->validate([
                'budget_year_id' => 'required',
                'fund_source' => 'required',
                'reference_document' => 'required',
                'appropriation_type' => 'required',
                'department' =>'required'
            ]);
            
            // $getApproId = Appropriation::latest('id')->first();

            // $approId = "APPRO_".++$getApproId['id'];

            $approId = "APPRO_"."2";


            // INSERT DATA IN APPROPRIATION TABLE
            $enrollDetails = Appropriation::create([

                'appro_id' => $approId,
                'budget_year_id' => $request->budget_year_id,
                'fund_source' => $request->fund_source,
                'reference_document' => $request->reference_document,
                'appropriation_type_id' => $request->appropriation_type,
                'department' => $request->department,
                'department_code_id' => $request->office_code,
                'status' => $request->status,

            ]);

            // INSERT DATA IN PROGRAM TABLE
            $enrollProgram = Program::create([

                'appro_id' => $approId,
                'program' => $request->program,
                'program_code' => $request->program_code,

            ]);

            // INSERT DATA IN PROJECT TABLE
            $enrollProject = Project::create([

                'appro_id' => $approId,
                'program_code_id' => $request->program_code,
                'project' => $request->project,
                'project_code' => $request->project_code,
                
            ]);

            // INSERT DATA IN ACTIVITY TABLE
            $enrollActivity = Activity::create([

                'appro_id' => $approId,
                'department_code_id' => $request->office_code,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code,
                'activity' => $request->activity,
                'activity_code' => $request->activity_code,
                'activity_description' => $request->activity_description,

            ]);

            // INSERT DATA IN EXPENSES TABLE
            $enrollExpenses = Expenses::create([

                'appro_id' => $approId,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code,
                'activity_code_id' => $request->activity_code,
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'appropriation_amount' => $request->appropriation_amount,

            ]);

            $enrollDetails->save();
            $enrollProgram->save();
            $enrollProject->save();
            $enrollActivity->save();
            $enrollExpenses->save();

            // RETURN RESULT
            return response()->json([

                'status' => true,
                'message' => "Insert data success!",
                'Details' => $enrollDetails,
                'Program' => $enrollProgram,
                'Project' => $enrollProject,
                'Activity' => $enrollActivity,
                'Expenses' => $enrollExpenses,

            ]);

        } catch(\Throwable $th){

            return response()->json([

                'status' => false,
                'message' => "Something went wrong!",
                'error' => $th->getMessage()

            ]);
        }
    }

    
    // FILTER APPROPRIATION FOR UPDATE
    public function FilterAppropriation(Request $request){

        try{

            // $request->validate([
            //     'budget_year_id' => 'required',
            //     'fund_source' => 'required',
            //     'type_of_adjustment' => 'required',
            //     'supplementary_budget_number' => 'required',
            //     'reference_document' => 'required',
            //     'department' => 'required',
            //     'program' => 'required',
            //     'project' => 'required',
            //     'activity' => 'required',
            // ]);

            $data = Appropriation::with('programs.projects.activities')
            ->get();

            //$data = Program::with('projects')->where('program_code', $request->program_code)->get();

            // $data = Appropriation::where('budget_year_id', '=', $request->budyear)->first();

            return response()->json([

                'status' => true,
                'message' => 'successfully fetch',
                'data' => $data,


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

