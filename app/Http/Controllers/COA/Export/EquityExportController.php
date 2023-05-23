<?php

namespace App\Http\Controllers\COA\Export;

use Illuminate\Http\Request;
use App\Exports\COA\EquityExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class EquityExportController extends Controller
{
    public function export(Request $request){
        
        return Excel::download(new EquityExport($request->date), 'EQUITY-'.$request->date.'.xlsx',);
    }
}
