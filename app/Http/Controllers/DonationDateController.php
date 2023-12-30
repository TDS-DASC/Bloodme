<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationDate;

class DonationDateController extends Controller
{
        public function create(Request $request){
        $validateData = $request->validate([
            'user_id' => 'required',
           'campaign_id' => 'required',
           'date_donation' => 'required',
           'nombre_receptor' => 'sometimes',
           'medical_unit_id' => 'required',
        ]);
        $donation = DonationDate::create($validateData);
        $donation->save();

        return response(['donationDate ' => $donation]);
    }
    public function showid($id){
        $donationDate = DonationDate::find($id);

        if(!$donationDate){
            return response()->json(['message' => '*donationDate* not found'],404);

        }

        return response()->json(['donationDate' => $donationDate],200);
    }

    public function showall(){
        $donationDates = DonationDate::all();

        return response()->json(['donationDates' => $donationDates],200);
    }

    public function showByInput($input, $looking){

        $donationDates = DonationDate::where($input,$looking)->get();

        if(!$donationDates){
            return response()->json(['message' => 'Input error/donationDate Not found'],404);
        }

        return response()->json(['donationDates' => $donationDates],200);

    }
    public function deleteWID($id){
        $donationDate = DonationDate::find($id);

        if(!$donationDate){
            return response()->json(['message' => 'donationDate Not found'],404);
        }

        $donationDate -> delete();

        return response()->json(['donationDate' => $donationDate, 'message' => 'Deleted donationDate OK'],200);
    }


    public function delete(Request $request){
        $donationDate = DonationDate::find($request->input('id'));

        if(!$donationDate){
            return response()->json(['message' => 'donationDate Not found'],404);
        }

        $donationDate -> delete();

        return response()->json(['donationDate' => $donationDate, 'message' => 'Deleted donationDate OK'],200);
    }

    public function updateWID(Request $request, $id){ //request + ID
        $donationDate = DonationDate::find($id);

        if(!$donationDate){
            return response()->json(['message' => 'donationDate Not found'],404);
        }

        $donationDate -> update($request->all());

        return response()->json(['donationDate' => $donationDate, 'message' => 'Updated donationDate OK'],200);
    }

    public function update(Request $request){
        $donationDate = DonationDate::find($request->input('id'));

        if(!$donationDate){
            return response()->json(['message' => 'donationDate Not found'],404);
        }

        $donationDate -> update($request->all());

        return response()->json(['donationDate' => $donationDate, 'message' => 'Updated donationDate OK'],200);
    }
}
