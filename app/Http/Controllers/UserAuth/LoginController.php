<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginuserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //LOGIN USER
    public function index(LoginuserRequest $request){

        try {

            $credential = $request->validated(); 

            if (Auth::attempt($credential)) {

                $request->session()->regenerate();

                return response()->json([

                    'status' => true,
                    'message' => 'You Successfully Logged In',
                    'auth' => $credential

                ]);
            }

            return response()->json([

                'status' => false,
                'message' => "something went wrong login failed",
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



    // public function show(){

    //     $users = DB::select("CALL GetUsers()");

    //     // $id = 6;
    //     // $users = DB::select("CALL GetUsers(".$id.")");
        
    //     return response()->json([
    //         'data' => $users
    //     ]);
        
    // }


}
