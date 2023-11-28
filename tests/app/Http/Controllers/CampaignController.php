<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function create(Request $request){
        $validateData = $request->validate([
           'start_campaign' => 'required',
            'donations_required' => 'required',
            'user_id' => 'required'
        ]);
        $campaign = Campaign::create($validateData);
        $campaign->save();

        return response(['campaign' => $campaign]);

    }


    public function showid($id){
        $campaign = Campaign::find($id);

        if(!$campaign){
            return response()->json(['message' => '*Campaign* not found'],404);

        }

        return response()->json(['Campaign' => $campaign],200);
    }

    public function showall(){
        $campaigns = Campaign::all();

        return response()->json(['Campaigns' => $campaigns],200);
    }

    public function showByInput($input, $looking){

        $campaigns = Campaign::where($input,$looking)->get();

        if(!$campaigns){
            return response()->json(['message' => 'Input error/Campaign Not found'],404);
        }

        return response()->json(['Campaigns' => $campaigns],200);

    }
    public function deleteWID($id){
        $campaign = Campaign::find($id);

        if(!$campaign){
            return response()->json(['message' => 'Campaign Not found'],404);
        }

        $campaign -> delete();

        return response()->json(['Campaign' => $campaign, 'message' => 'Deleted Campaign OK'],200);
    }


    public function delete(Request $request){
        $campaign = Campaign::find($request->input('id'));

        if(!$campaign){
            return response()->json(['message' => 'Campaign Not found'],404);
        }

        $campaign -> delete();

        return response()->json(['Campaign' => $campaign, 'message' => 'Deleted Campaign OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $campaign = Campaign::find($id);

        if(!$campaign){
            return response()->json(['message' => 'Campaign Not found'],404);
        }

        $campaign -> update($request->all());

        return response()->json(['Campaign' => $campaign, 'message' => 'Updated Campaign OK'],200);
    }

    public function update(Request $request){
        $campaign = Campaign::find($request->input('id'));

        if(!$campaign){
            return response()->json(['message' => 'Campaign Not found'],404);
        }

        $campaign -> update($request->all());

        return response()->json(['Campaign' => $campaign, 'message' => 'Updated Campaign OK'],200);
    }
}
