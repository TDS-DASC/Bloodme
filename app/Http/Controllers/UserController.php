<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showid($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'No encontre a ningun papu'],404);

        }

        return response()->json(['user' => $user],200);
    }




    public function showall(){
        $users = User::all();

        return response()->json(['users' => $users],200);
    }
}
