<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalUnit;

class MedicalUnitController extends Controller
{
    public function create(Request $request){
        $validateData = $request->validate([
           'name' => 'required',
           'urlGmaps' => 'required',
           "multiple_donation" => 'sometimes',
           "donations_limit_day" => 'sometimes',
        ]);
        $medicalUnit = MedicalUnit::create($validateData);
        $medicalUnit->save();

        return response(['MedicalUnit ' => $medicalUnit]);
    }
    public function showid($id){
        $medicalUnit = MedicalUnit::find($id);

        if(!$medicalUnit){
            return response()->json(['message' => '*MedicalUnit* not found'],404);

        }

        return response()->json(['MedicalUnit' => $medicalUnit],200);
    }

    public function showall(){
        $medicalUnits = MedicalUnit::all();

        return response()->json(['MedicalUnits' => $medicalUnits],200);
    }

    public function showByInput($input, $looking){

        $medicalUnits = MedicalUnit::where($input,$looking)->get();

        if(!$medicalUnits){
            return response()->json(['message' => 'Input error/MedicalUnit Not found'],404);
        }

        return response()->json(['MedicalUnits' => $medicalUnits],200);

    }
    public function deleteWID($id){
        $medicalUnit = MedicalUnit::find($id);

        if(!$medicalUnit){
            return response()->json(['message' => 'MedicalUnit Not found'],404);
        }

        $medicalUnit -> delete();

        return response()->json(['MedicalUnit' => $medicalUnit, 'message' => 'Deleted MedicalUnit OK'],200);
    }


    public function delete(Request $request){
        $medicalUnit = MedicalUnit::find($request->input('id'));

        if(!$medicalUnit){
            return response()->json(['message' => 'MedicalUnit Not found'],404);
        }

        $medicalUnit-> delete();

        return response()->json(['MedicalUnit' => $medicalUnit, 'message' => 'Deleted MedicalUnit OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $medicalUnit = MedicalUnit::find($id);

        if(!$medicalUnit){
            return response()->json(['message' => 'MedicalUnit Not found'],404);
        }

        $medicalUnit -> update($request->all());

        return response()->json(['MedicalUnit' => $medicalUnit, 'message' => 'Updated MedicalUnit OK'],200);
    }

    public function update(Request $request){
        $medicalUnit = MedicalUnit::find($request->input('id'));

        if(!$medicalUnit){
            return response()->json(['message' => 'MedicalUnit Not found'],404);
        }

        $medicalUnit -> update($request->all());

        return response()->json(['MedicalUnit' => $medicalUnit, 'message' => 'Updated MedicalUnit OK'],200);
    }
}
