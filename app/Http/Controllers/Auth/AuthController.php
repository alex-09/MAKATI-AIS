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
            if (Auth::attempt($input)) {
                
                if(Auth::user()->role_id==1){

                    //ADMIN USER
                    return response()->json([
                        'status' => true,
                        'message' => 'Welcome Admin',
                        'token' =>Auth::user()
                    ]);

                }elseif(Auth::user()->role_id==2){

                    //APPROVER USER
                    return response()->json([
                        'status' => true,
                        'message' => 'Welcome Approver',
                    ]);     

                }elseif(Auth::user()->role_id==3){

                    //RECEIVER USER
                    return response()->json([
                        'status' => true,
                        'message' => 'Welcome Receiver'
                    ]);

                }elseif(Auth::user()->role_id==4){

                    //ENCODER USER
                    return response()->json([
                        'status' => true,
                        'message' => 'Welcome Encoder'
                    ]);    

                }elseif(Auth::user()->role_id==5){

                    //PROCESSOR USER
                    return response()->json([
                        'status' => true,
                        'message' => 'Welcome Processor'
                    ]);  

                }elseif(Auth::user()->role_id==6){

                    //BOOKKEEPER USER
                    return response()->json([
                        'status' => true,
                        'message' => 'Welcome Bookkeeper'
                    ]);       
                }
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
