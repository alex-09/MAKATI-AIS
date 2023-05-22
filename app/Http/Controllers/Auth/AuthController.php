<?php

namespace App\Http\Controllers\Auth;
use Throwable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password AS RulesPassword;
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
                'user' => $user
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

    public function forgotPass(Request $request){

        try{

            $request->validate([
                'email' => 'required|email'
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            if($status == Password::RESET_LINK_SENT){

                return response()->json([
                    'status' => __($status)
                ]);
            }

            return response()->json([
                'status' => __($status)
            ], 500);


        }catch ( \Exception $e ) {
            return response()->json([
                'error'=>$e->getMessage()
            ], 500);
        }
    }

    public function reset(Request $request){

        try{

            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => ['required', 'confirmed', RulesPassword::min(8)
                ->letters()
                ->numbers()]

            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function($user) use ($request){
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }

            );

            if($status == Password::PASSWORD_RESET){
                return response()->json([
                    'message' => 'Password Reset Successfully'
                ]);
            }

            return response()->json([
                'message' => __($status),
            ], 500);


        }catch ( \Exception $e ) {
            return response()->json([
                'error'=>$e->getMessage()
            ], 500);
        }
    }
}
