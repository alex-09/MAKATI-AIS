<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends Controller
{

    //REGISTER
    public function register(Request $request){ 

        try{

            $input = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);

            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'role_id' => 1,
                'password' => Hash::make($input['password'])
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User successfully created',
                'data' => $user,
            ]);

        }catch (Throwable $th){

            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong!',
                'error' => $th->getMessage()
            ]);   

        }
    }


    //LOGIN
    public function login(Request $request)
    {
        try{

            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $input = $request->only('email', 'password');
            if(Auth::attempt($input)){
                return response()->json([
                    'status' => true,
                    'message' => 'Logged In Successfully',
                    'data' => Auth::user()
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Your have entered a wrong name or password!'
            ]);
        
        }catch(\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong!',
                'error' => $th->getMessage()
            ]);   

        }

    }

    public function logout(){

        Auth::logout();

        return response()->json([
            'status' => true,
            'message' => "logout succesfully"
        ]);

    }
}
