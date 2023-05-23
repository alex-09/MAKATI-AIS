<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\EquityImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class EquityImportController extends Controller
{
    public function Import(Request $request)
    {

        try {
            Excel::import(new EquityImport, $request->file);

            DB::table('coa_equity_temps')->update(array('coa_title' => $request->title, 'date_effectivity' => $request->date));

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
