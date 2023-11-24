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
            return response()->json(['message' => '*USER* not found'],404);

        }

        return response()->json(['user' => $user],200);
    }

    public function showall(){
        $users = User::all();

        return response()->json(['users' => $users],200);
    }

    public function showByInput($input, $looking){

        $users = User::where($input,$looking)->get();

        if(!$users){
            return response()->json(['message' => 'Input errorr/User Not found'],404);
        }

        return response()->json(['users' => $users],200);

    }
    public function deleteWID($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }

        $user -> delete();

        return response()->json(['user' => $user, 'message' => 'Deleted user OK'],200);
    }


    public function delete($request){
        $user = User::find($request->input('id'));

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }

        $user -> delete();

        return response()->json(['user' => $user, 'message' => 'Deleted user OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }

        $user -> update($request->all());

        return response()->json(['user' => $user, 'message' => 'Updated user OK'],200);
    }

    public function update(Request $request){
        $user = User::find($request->input('id'));

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }

        $user -> update($request->all());

        return response()->json(['user' => $user, 'message' => 'Updated user OK'],200);
    }
}
