<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Imports\User\UsersImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function Import(Request $request)
    {
        try {
            Excel::import(new UsersImport, $request->file);

            DB::table('users')->update(array('password' => Hash::make('qwerty')));

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
