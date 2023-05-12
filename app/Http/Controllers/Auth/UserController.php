<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function getDetails(Request $request){
        try{
            $user = User::join('personal_access_tokens', 'users.id', 'personal_access_tokens.tokenable_id')
            ->where('personal_access_tokens.token', $request->token)->first();
            return response()->json(['user' => $user]);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => "Something went Wrong",
                'error' => $th->getMessage()
            ]);
        }
    }
}
