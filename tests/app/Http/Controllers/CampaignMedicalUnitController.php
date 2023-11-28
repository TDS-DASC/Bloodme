<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampaignMedicalUnit;

class CampaignMedicalUnitController extends Controller
{

    public function create(Request $request){
        $validateData = $request->validate([
           'campaign_id' => 'required',
           'medical_unit_id' => 'required',
        ]);
        $cmunit = CampaignMedicalUnit::create($validateData);
        $cmunit->save();

        return response(['cmunit' => $cmunit]);
    }
    public function showid($id){
        $campaignMedicalUnit = CampaignMedicalUnit::find($id);

        if(!$campaignMedicalUnit){
            return response()->json(['message' => '*campaignMedicalUnit* not found'],404);

        }

        return response()->json(['campaignMedicalUnit' => $campaignMedicalUnit],200);
    }

    public function showall(){
        $campaignMedicalUnits = CampaignMedicalUnit::all();

        return response()->json(['campaignMedicalUnits' => $campaignMedicalUnits],200);
    }

    public function showByInput($input, $looking){

        $campaignMedicalUnits = CampaignMedicalUnit::where($input,$looking)->get();

        if(!$campaignMedicalUnits){
            return response()->json(['message' => 'Input error/campaignMedicalUnit Not found'],404);
        }

        return response()->json(['campaignMedicalUnits' => $campaignMedicalUnits],200);

    }
    public function deleteWID($id){
        $campaignMedicalUnit = CampaignMedicalUnit::find($id);

        if(!$campaignMedicalUnit){
            return response()->json(['message' => 'campaignMedicalUnit Not found'],404);
        }

        $campaignMedicalUnit -> delete();

        return response()->json(['campaignMedicalUnit' => $campaignMedicalUnit, 'message' => 'Deleted campaignMedicalUnit OK'],200);
    }


    public function delete(Request $request){
        $campaignMedicalUnit = campaignMedicalUnit::find($request->input('id'));

        if(!$campaignMedicalUnit){
            return response()->json(['message' => 'campaignMedicalUnit Not found'],404);
        }

        $campaignMedicalUnit -> delete();

        return response()->json(['campaignMedicalUnit' => $campaignMedicalUnit, 'message' => 'Deleted campaignMedicalUnit OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $campaignMedicalUnit = campaignMedicalUnit::find($id);

        if(!$campaignMedicalUnit){
            return response()->json(['message' => 'campaignMedicalUnit Not found'],404);
        }

        $campaignMedicalUnit -> update($request->all());

        return response()->json(['campaignMedicalUnit' => $campaignMedicalUnit, 'message' => 'Updated campaignMedicalUnit OK'],200);
    }

    public function update(Request $request){
        $campaignMedicalUnit = campaignMedicalUnit::find($request->input('id'));

        if(!$campaignMedicalUnit){
            return response()->json(['message' => 'campaignMedicalUnit Not found'],404);
        }

        $campaignMedicalUnit -> update($request->all());

        return response()->json(['campaignMedicalUnit' => $campaignMedicalUnit, 'message' => 'Updated campaignMedicalUnit OK'],200);
    }
}
