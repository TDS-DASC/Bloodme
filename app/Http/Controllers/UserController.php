<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Campaign;
use App\Models\DonationDate;

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
            return response()->json(['message' => 'Input error/User Not found'],404);
        }

        return response()->json(['users' => $users],200);

    }
    public function deleteWID($id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }


        $campañas = Campaign::where('user_id',$id)->get();
        $campañas = DonationDate::where('user_id',$id)->get();
        if($campañas){
            return response()->json(['message' => 'Error, user has a campaing or date'],409);
        }

        $user -> delete();

        return response()->json(['user' => $user, 'message' => 'Deleted user OK'],200);
    }


    public function delete(Request $request){
        $user = User::find($request->input('id'));

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }

        $campañas = Campaign::where('user_id',$request->input('id'))->get();
        $campañas = DonationDate::where('user_id',$request->input('id'))->get();
        if($campañas){
            return response()->json(['message' => 'Error, user has a campaing or date'],401);
        }


        $user -> delete();

        return response()->json(['user' => $user, 'message' => 'Deleted user OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User Not found'],404);
        }

        $userDataExtra = $request->except('password');
        if ($request->has('password')) {
            $userDataExtra['password'] = Hash::make($request->input('password'));
        }

        $user -> update($userDataExtra);

        return response()->json(['user' => $user, 'message' => 'Updated user OK'],200);
    }

    public function update(Request $request){
        $user = User::find($request->input('id'));

        $userDataExtra = $request->except('password');
        if ($request->has('password')) {
            $userDataExtra['password'] = Hash::make($request->input('password'));
        }

        $user -> update($userDataExtra);

        return response()->json(['user' => $user, 'message' => 'Updated user OK'],200);
    }
}
