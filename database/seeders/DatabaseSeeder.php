<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        $this->call(MedicalUnitSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(DonationSeeder::class);
        $this->call(CampaignMedicalUnitSeeder::class);
        $this->call(DonationDateSeeder::class);

    }
}
