<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\COA\ExpensesImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExpensesImportController extends Controller
{
    public function Import(Request $request)
    {

        try {
            Excel::import(new ExpensesImport, $request->file);

            DB::table('coa_expenses_temps')->update(array('coa_title' => $request->title, 'date_effectivity' => $request->date));

            return response()->json([
                'status' => true,
                'message' => 'successfully imported!'
            ]);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return response()->json([
                'status' => true,
                'error' => $e->failures()
            ]);
        }
    }
}
