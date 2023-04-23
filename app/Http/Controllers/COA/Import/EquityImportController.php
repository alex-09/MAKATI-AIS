<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\EquityImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class EquityImportController extends Controller
{
    public function Import(Request $request){
        
        Excel::import(new EquityImport, $request->file);

        return response()->json([
            'status' => true,
            'message' => 'successfully imported!'
        ]);
    }
}
