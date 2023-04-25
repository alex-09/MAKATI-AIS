<?php

namespace App\Http\Controllers\COA\Export;

use Illuminate\Http\Request;
use App\Exports\COA\IncomeExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class IncomeExportController extends Controller
{
    public function export(Request $request){
        
        return Excel::download(new IncomeExport($request->date), 'INCOME-'.$request->date.'.csv',);
    }
}
