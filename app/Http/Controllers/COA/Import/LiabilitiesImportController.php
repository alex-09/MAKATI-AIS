<?php

namespace App\Http\Controllers\COA\Import;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\COA\LiabilitiesImport;

class LiabilitiesImportController extends Controller
{
    public function Import(Request $request){
        
        Excel::import(new LiabilitiesImport, $request->file);

        return response()->json([
            'status' => true,
            'message' => 'successfully imported!'
        ]);
    }
}
