<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

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
        return response()->json(['user'=>$request->user()]);
    }
}
