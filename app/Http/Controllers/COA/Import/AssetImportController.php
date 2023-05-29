<?php

namespace App\Http\Controllers\COA\Import;

use App\Imports\COA\AssetsImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\COAUploadRequest;

class AssetImportController extends Controller
{
    public function Import(COAUploadRequest $request)
    {

        try {
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
