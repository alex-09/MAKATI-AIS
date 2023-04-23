<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\ExpensesImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExpensesImportController extends Controller
{
    public function Import(Request $request){
        
        Excel::import(new ExpensesImport, $request->file);

        return response()->json([
            'status' => true,
            'message' => 'successfully imported!'
        ]);
    }
}
