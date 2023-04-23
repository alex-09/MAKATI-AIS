<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\IncomeImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class IncomeImportController extends Controller
{
    public function Import(Request $request){
        
        Excel::import(new IncomeImport, $request->file);

        return response()->json([
            'status' => true,
            'message' => 'successfully imported!'
        ]);
    }
}
