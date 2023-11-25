<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            'gender' => 'required'
        ]);



        $user = User::create($validateData);
        $user->password = Hash::make($request->password);
        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;
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
       $accessToken = auth()->user()->createToken('authToken')->accessToken;

       $user = Auth::user();

       return response(['user' => $user, 'access_token' => $accessToken]);

      // return response(['message' => 'fuckingLogin']);
      // $accessToken = $user->createToken('authToken')->accessToken;
        //$credentials = $request->only('email', 'password');
        //if(auth()->attempt($credentials)) {
      //      $user = auth()->user();
    //        $accessToken = $user->createToken('authToken')->accessToken;

  //          return response(['user' => $user, 'access_token' => $accessToken]);
//        }
      //  return response(['message' => 'Credenciales invalidas'], 401);
    }
}
