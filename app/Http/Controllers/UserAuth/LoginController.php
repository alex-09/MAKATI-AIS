<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginuserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(LoginuserRequest $request){

        try {

            $credential = $request->validated(); 

            if (Auth::attempt($credential)) {

                return response()->json([

                    'status' => false,
                    'message' => "something went wrong login failed",
                    'auth' => $credential

                ]);
            }

            return response()->json([

                'status' => true,
                'message' => 'You Successfully Logged In',
                'auth' => $credential

            ]);
        
        } catch (\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => "something went wrong",
                'error' => $th->getMessage()
            ]);
        }
    }


}
