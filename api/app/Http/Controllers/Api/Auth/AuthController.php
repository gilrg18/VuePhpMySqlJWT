<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Login method
    public function login(){

    }

    //Register method
    public function register(RegistrationRequest $request)
    {
        $user = User::create($request->validated());
        if($user){
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while trying to create user'
            ], 500);
        }
    }

    //Return jwt access token
    public function responseWithToken($token, $user){
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }
}
