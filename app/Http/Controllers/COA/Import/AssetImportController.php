<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Imports\COA\AssetsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AssetImportController extends Controller
{
    public function Import(Request $request){
        
        try{
            Excel::import(new AssetsImport, $request->file);

            return response()->json([
                'status' => true,
                'message' => 'successfully imported!'
            ]);

            }catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                return response()->json([
                    'status' => true,
                    'error' => $e->failures()
                ]);
        }
    }
}
