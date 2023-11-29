<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-3";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->description = "HOLA SOY UNA DESCRIPCION";
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-3";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-3";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-10";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-15";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-20";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-25";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();

        $campaign = new Campaign();
        $campaign->start_campaign = "2022-12-31";
        $campaign->platelets = 0;
        $campaign->blood = 1;
        $campaign->donations_required = 10;
        $campaign->current_donations = 5;
        $campaign->user_id = 1;
        $campaign->save();
    }
}
