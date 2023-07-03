<?php

namespace App\Http\Controllers\BAT\ExecutiveBudget\Processor\Dropdwons;

use App\Models\BudgetYear;
use App\Models\FundSource;
use App\Models\AppropriationType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExecDropdwonController extends Controller
{
    public function execDropdown(){
        return response()->json([
            'Year' => BudgetYear::all(),
            'approType' => AppropriationType::all(),
            'fundSource' => FundSource::all(),
            'department' => DB::select('CALL departments()'),
            'adjustment' => Adjustment::all(),
        ]);
    }

    public function execDropdown2(){
        return response()->json([
            'programs' => DB::select('CALL exec_programs()'),
            'projects' => DB::select('CALL exec_projects()'),
            'activity' => DB::select('CALL exec_activity()'),
        ]);
    }
}
