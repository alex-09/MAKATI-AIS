<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\AssetsImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AssetImportController extends Controller
{
    public function Import(Request $request)
    {

        try {

            // $request->validate([
            //     'date' => 'required|unique:coa_assets_previouses,date_effectivity|unique:coa_assets,date_effectivity',
            //     'title' => 'required',
            //     'file' => 'required', 'mimes:csv',
            // ]);
            
            Excel::import(new AssetsImport, $request->file);

            DB::table('coa_assets_temps')->update(array('coa_title' => $request->title, 'date_effectivity' => $request->date, 'approval_status' => 'For Approval - DH'));

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
