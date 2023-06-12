<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getDetails(Request $request){
        try{
            $user = User::where('email', $request->email)->first();
            return response()->json(['user' => $user]);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => "Something went Wrong",
                'error' => $th->getMessage()
            ]);
        }
    }

    public function me(Request $request){
        try{
            
            return response()->json(['user'=> $request->user()]);

        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => "Something went Wrong",
                'error' => $th->getMessage()
            ]);
        }
    }
}
