<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
//use App\Models\DonationDate;

class DonationController extends Controller
{
    public function create(Request $request){
        $validateData = $request->validate([
           'donation_date' => 'required',
           'blood_type' => 'required',
           'campaign_id' => 'required',
           'medical_unit_id' => 'required',
            'user_id' => 'required'
        ]);
        $donation = Donation::create($validateData);
        $donation->save();

        return response(['donatio ' => $donation]);

    }

    public function showid($id){
        $donation = Donation::find($id);

        if(!$donation){
            return response()->json(['message' => '*donation* not found'],404);

        }

        return response()->json(['donation' => $donation],200);
    }

    public function showall(){
        $donations = Donation::all();

        return response()->json(['donations' => $donations],200);
    }

    public function showByInput($input, $looking){

        $donations = Donation::where($input,$looking)->get();

        if(!$donations){
            return response()->json(['message' => 'Input error/donation Not found'],404);
        }

        return response()->json(['donations' => $donations],200);

    }
    public function deleteWID($id){
        $donation = Donation::find($id);

        if(!$donation){
            return response()->json(['message' => 'donation Not found'],404);
        }

        $donation -> delete();

        return response()->json(['donation' => $donation, 'message' => 'Deleted donation OK'],200);
    }


    public function delete(Request $request){
        $donation = Donation::find($request->input('id'));

        if(!$donation){
            return response()->json(['message' => 'donation Not found'],404);
        }

        $donation -> delete();

        return response()->json(['donation' => $donation, 'message' => 'Deleted donation OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $donation = Donation::find($id);

        if(!$donation){
            return response()->json(['message' => 'donation Not found'],404);
        }

        $donation -> update($request->all());

        return response()->json(['donation' => $donation, 'message' => 'Updated donation OK'],200);
    }

    public function update(Request $request){
        $donation = Donation::find($request->input('id'));

        if(!$donation){
            return response()->json(['message' => 'donation Not found'],404);
        }

        $donation -> update($request->all());

        return response()->json(['donation' => $donation, 'message' => 'Updated donation OK'],200);
    }
}
