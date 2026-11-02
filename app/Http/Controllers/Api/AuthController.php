<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $data['token'] = $user->createToken('ApiRegister')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiResponse::send(201,true,'you have sign up',$data);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $user = User::where('email', $credentials['email'])->first();

        if(! $user || ! Hash::check($credentials['password'], $user->password)){
            return ApiResponse::send(401,false,'Invalid email or password');
        } else {
            $data['token'] = $user->createToken('ApiLogin')->plainTextToken;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            return ApiResponse::send(200,true,'you have logged in',$data);

        }
        
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::send(200,true,'you have logged out');

    }
}
