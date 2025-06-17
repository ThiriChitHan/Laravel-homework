<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try{
            $credentials = $request->only(['email','password']);
            if(!JWTAuth::attempt($credentials)){
                return $this->error("Your Email and Password is wrong!",null,401);
            }
            $user=User::where('email', $credentials['email'])->first();
            $payload = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'gender' => $user->gender,
                'status' => $user->status ===1 ? 'active' : 'suspend',
                'phone' => $user->phone,
            ];
            $token =JWTAuth::customClaims($payload)->attempt(['email' => $user->email,'password' =>  $credentials['password'] ]);
            return $this->success($token,"User Login Sccessfully" , 200);
        }catch(Exception $e){
            return $this->error($e->getMessage()? $e->getMessage() : "Something went wron!",null,500);
        }
    }

    public function register(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all(),[
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,except,id',
                'phone' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'password' =>'required'
            ]);
           if ($validateUser->fails()) {
                $this->error('Validation Error', $validateUser->errors(), 422);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            return $this->success($user, "User Created Successsfully" , 200);


        }catch(Exception $e){
            return $this->error($e->getMessage()? $e->getMessage() : "Something went wron!",null,500);
        }
    }
}
