<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:20',
                'address'=>'required|string|max:255',
                'phone' => 'required|string|max:20|regex:/^\+8801[3-9][0-9]{8}$/|unique:users,phone',
                'password'=>'required|string|min:6|confirmed',
            ],[
                'phone.regex'=>'Phone number must be starting with +880',
                'password.confirmed' => 'Password and confirm password do not match'
            ]);

            if($validator->fails()){
                return $this->errorResponse($validator->errors()->first(),'Validation Error',Response::HTTP_BAD_REQUEST);
            }

            $data = $validator->validated();
            $data['role'] = 'user';
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            return $this->successResponse($user,'Registration Successful',Response::HTTP_CREATED);
        }catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(),'Something went wrong',500);
        }
    }

    public function login(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required|string|max:20',
                'password'=>'required|string|min:6',
            ]);

            if($validator->fails()){
                return $this->errorResponse($validator->errors()->first(),'Validation Error',Response::HTTP_BAD_REQUEST);
            }
            $credentials = $request->only('phone','password');

            if (!$token = JWTAuth::attempt($credentials)){
                return $this->errorResponse('Unauthenticated','Unauthenticated', Response::HTTP_UNAUTHORIZED);
            }

            return $this->successResponse([
                'user' => JWTAuth::user(),
                'token' => $token,
            ],'Login Successfully',Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(),'Something went wrong',500);
        }
    }

    public function logout(){
        try {
            Auth::logout();

            JWTAuth::invalidate();

            return $this->successResponse('','Logged out Successfully',Response::HTTP_OK);
        }catch (\Exception $exception){
            return $this->errorResponse($exception->getMessage(),'Something went wrong',500);
        }
    }
}
