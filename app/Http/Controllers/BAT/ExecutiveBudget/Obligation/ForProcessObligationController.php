<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Obligation;

use App\Http\Controllers\Controller;
use App\Models\BudgetYear;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

class ForProcessObligationController extends Controller
{
    public function getData(){

        return response()->json([
            'budgetYear' => BudgetYear::all(), 
            // 'fundSource' => fundSource::all(),
            'department' => Department::all()
        ]);
    }

    public function getPrograms(Request $request){

        $programs = Program::where(
            'department_id', $request->dept_id)->get();

        if (count($programs) > 0) return response()->json([ 'program' => $programs ]);

    }
}
