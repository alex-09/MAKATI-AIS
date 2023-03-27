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

            // INSERT DATA IN APPROPRIATION TABLE
            $enrollDetails = Appropriation::create([

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

                'budget_year_id' => $request->budget_year_id,
                'department_code_id' => $request->office_code,
                'program' => $request->program,
                'program_code' => $request->program_code,

            ]);

            // INSERT DATA IN PROJECT TABLE
            $enrollProject = Project::create([

                'budget_year_id' => $request->budget_year_id,
                'department_code_id' => $request->office_code,
                'program_code_id' => $request->program_code,
                'project' => $request->project,
                'project_code' => $request->project_code,
                
            ]);

            // INSERT DATA IN ACTIVITY TABLE
            $enrollActivity = Activity::create([

                'budget_year_id' => $request->budget_year_id,
                'department_code_id' => $request->office_code,
                'program_code_id' => $request->program_code,
                'project_code_id' => $request->project_code,
                'activity' => $request->activity,
                'activity_code' => $request->activity_code,
                'activity_description' => $request->activity_description,

            ]);

            // INSERT DATA IN EXPENSES TABLE
            $enrollExpenses = Expenses::create([

                'budget_year_id' => $request->budget_year_id,
                'department_code_id' => $request->office_code,
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

            // $years = BudgetYear::join('appropriations')->where('appropriations.budget_year.id', 1)
            //                     ->join('programs', 'programs.department_code_id', '=', 'appropriations.department_code_id')
            //                     ->join('projects', 'projects.program_code_id', '=', 'programs.program_code')
            //                     ->join('activities', 'activities.project_code_id', '=', 'projects.project_code')
            //                     ->join('expenses', 'expenses.activity_code_id', '=', 'activity_code')
            //                     ->get(['budget_years.*', 'appropriations.*', 'programs.*', 'projects.*', 'activities.*', 'expenses.*'])
            //                     ->first();

            $appro = DB::select('CALL appropriations_by_year(?,?)', 
                [$request->year, $request->department]);

            $program = DB::select('CALL programs(?,?,?)', 
                [$request->year, $request->department, $request->program]);

            $projects = DB::select('CALL projects(?,?,?,?)', 
                [$request->year, $request->department, $request->program, $request->project]);

            $activities = DB::select('CALL activities(?,?,?,?,?)', 
                [$request->year, $request->department, $request->program, $request->project, $request->activity]);

            $expenses = DB::select('CALL expenses(?,?,?,?,?)', 
                [$request->year, $request->department, $request->program, $request->project, $request->activity]);

            return response()->json([

                'status' => true,
                'message' => 'successfully fetch',
                'appro' => $appro,
                'program' => $program,
                'projects' => $projects,
                'activities' => $activities,
                'expenses' => $expenses,

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

