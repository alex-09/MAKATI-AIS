<?php

namespace App\Http\Controllers\COA\Export;

use Illuminate\Http\Request;
use App\Exports\COA\ExpensesExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExpensesExportController extends Controller
{
    public function export(Request $request){
        
        return Excel::download(new ExpensesExport($request->date), 'EXPENSES-'.$request->date.'.csv',);
    }
}
