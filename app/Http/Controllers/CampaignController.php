<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    //
    public function showall(){
        $cammpaigns = Campaign::all();

        return response()->json(['users' => $cammpaigns],200);
    }
}
