<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Authentication extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password'=>'required'
        ]);

        $email = $request['email'];

        $user = User::where('email', $email)->firstOrFail();

        $token = $user->createToken('API TOKEN')->accessToken;

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)){
            return response(
                [
                    'success'=>true,
                    'message'=>'user logged in successfully',
                    'user'=>$user,
                    'token'=>$token
                ],200
            );
        }else {
            return response(
                [
                    'success' =>false,
                    'message'=>'Login Failed'
                ]
                );
        }


    }

    public function register(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        // 'name',
        // 'userId',
        // 'email',
        // 'password',

        $user = new User();
        $user->name = $request->name;
        $user->userId =  Str::uuid()->toString();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user ->save();

        if($res){
            return response(
                [
                    'success'=>true,
                    'message'=>'user registered successfully',
                    'user' =>$user
                ],200
            );
        }else{
            return response(
                [
                    'success'=>false,
                    'message'=>'User registered successfully'
                ],201
            );
        }

    }
    public function logout(Request $request){
        $token = $request->user()->token();
        $res = $token->revoke();

        if($res){
            return response([
                'success'=>true,
                'message' =>'logged out'
            ],200);
        }else{
            return response([
                'success' =>false,
                'message' =>'logout failed'
            ], 201);
        }

    }
}
