<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COAAssetsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AssetImport extends Controller
{
    public function Import(Request $request){
        
        Excel::import(new COAAssetsImport, $request->file);

        return response()->json([
            'status' => true,
        ]);
    }
}
