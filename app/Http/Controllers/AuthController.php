<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;




class AuthController extends Controller
{
    use HasApiTokens;

       public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'blood_type' => 'required',
            'curp' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'user_type' => 'sometimes',
            'donator' => 'sometimes'
        ]);


        $user = User::create($validateData);
        $user->password = Hash::make($request->password);
        $user->save();

        $accessToken = $user->createToken('authToken')->plainTextToken;
        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message' => 'invalid credentials']);
        }

        //CHECAR MAS TARDE CREATE TOKEN ._____.
       //$accessToken = auth()->user()->createToken('authToken')->accessToken;
       //$user = Auth::user();
       $user = User::where('email',$loginData['email'])->first();
       $accessToken = $user->createToken('authToken')->plainTextToken;


       return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return['message'=>'logged out user'];
    }
}
