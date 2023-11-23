<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampaignMedicalUnit;

class CampaignMedicalUnitController extends Controller
{
    

    public function showall(){

        $campaignMedicalUnits = CampaignMedicalUnit::all();
        return response()->json($campaignMedicalUnits);
    }
}
