<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\IncomeImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class IncomeImportController extends Controller
{
    public function Import(Request $request){

        try {
            Excel::import(new IncomeImport, $request->file);

            DB::table('coa_income_temps')->update(array('coa_title' => $request->title, 'date_effectivity' => $request->date));

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
