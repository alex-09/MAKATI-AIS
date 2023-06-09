<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\COA\LiabilitiesImport;

class LiabilitiesImportController extends Controller
{
    public function Import(Request $request){

        try {

            // $request->validate([
            //     'date' => 'required|unique:coa_assets_previouses,date_effectivity|unique:coa_assets,date_effectivity',
            //     'title' => 'required',
            //     'file' => 'required', 'mimes:csv',
            // ]);

            Excel::import(new LiabilitiesImport, $request->file);

            DB::table('coa_liabilities_temps')->update(array('coa_title' => $request->title, 'date_effectivity' => $request->date, 'approval_status' => 'For Approval - DH'));

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
