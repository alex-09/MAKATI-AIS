<?php

namespace App\Http\Controllers\COA\export;

use App\Exports\COA\AssetExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssetExportController extends Controller
{
    public function export(Request $request){
        
        return Excel::download(new AssetExport($request->date), 'ASSETS-'.$request->date.'.xlsx',);
    }
}
