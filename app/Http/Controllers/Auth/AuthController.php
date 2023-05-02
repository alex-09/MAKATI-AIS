<?php

namespace App\Http\Controllers\Auth;
use Throwable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            ], 500);   

        }
    }


    //LOGIN
    public function login(Request $request){

        try{

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    $validator->messages(), 
                    400);
            }
            
            $user = User::where('email', $request->email)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {

                return response()->json([
                    'error'=>'The email or password is incorrect, please try again'], 401);
            }

            $token = $user->createToken(Str::random(40));

            return response()->json([
                'message' => "Logged In Successfully",
                'token'=> $token->plainTextToken,
                'email' => $user->email
            ], 200);
        
        }catch(\Throwable $th){

            return response()->json([
                'status' => false,
                'message' => 'Something Went Wrong!',
                'error' => $th->getMessage()
            ], 500);   

        }

    }


    public function logout(Request $request){

        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    $validator->messages(), 
                    400);
            }

            $user = User::where('email', $request->email)->first();

            $user->tokens()->delete();

            return response()->json([
                'success'=>'Logged Out Successfully!'
            ]);

        } catch ( \Exception $e ) {
            return response()->json([
                'error'=>$e->getMessage()
            ], 500);
        }
    }
}
