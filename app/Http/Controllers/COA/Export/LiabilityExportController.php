<?php

namespace App\Http\Controllers\COA\Export;

use Illuminate\Http\Request;
use App\Exports\COA\LiabilityExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LiabilityExportController extends Controller
{
    public function export(Request $request){
        
        return Excel::download(new LiabilityExport($request->date), 'LIABILITY-'.$request->date.'.csv',);
    }
}
