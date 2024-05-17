<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiAuthController extends ApiController
{
   //Register
   public function register(Request $request){
        $attrs= $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);
        //create user
        $user = User::create([
            'name'=>$attrs['name'],
            'email'=>$attrs['email'],
            'password'=>bcrypt($attrs['password'])
        ]);
        //return user&token in response
        return response([
            'user'=>$user,
            'token'=>$user->createToken('secret')->plainTextToken
        ]);
   }
   //login
   public function login(Request $request){
    $attrs= $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6'
    ]);
    //attempt login
    if(!Auth::attempt($attrs)){
        return response([
            'message'=>'Invalid credentials'
        ], 403);
    }
    
    //return user&token in response
    return response([
        'user'=>auth()->user(),
        'token'=>auth()->user()->createToken('secret')->plainTextToken
    ], 200);
}

    //logout user
    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'Logout success'
        ], 200);
    }
    //get user details
    public function user(Request $request){
        $token = $request->bearerToken();
        return response([
            'user'=>auth()->user(),
            'token'=>$token
        ],200);
    }
}
