<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\DonationDate;

class DonationController extends Controller
{
    public function showallDates(){
        $donations = DonationDate::all();

        return response()->json(['donations dates' => $donations],200);
    }

    public function showallDonations(){
        $donations = Donation::all();

        return response()->json(['donations' => $donations],200);
    }
}
