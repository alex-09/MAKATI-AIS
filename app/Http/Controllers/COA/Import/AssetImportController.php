<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\COA\AssetsImport;
use Maatwebsite\Excel\Facades\Excel;

class AssetImportController extends Controller
{
    public function Import(Request $request){
        
        Excel::import(new AssetsImport, $request->file);

        return response()->json([
            'status' => true,
            'message' => 'successfully imported!'
        ]);
    }
}
