<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donation::create([
            'user_id' => 1,
            'donation_date' => '2022-12-10',
            'confirm' => 1,
            'blood_type' => 'A+',
            'campaign_id' => 1,
            'medical_unit_id' => 1,
        ]);

        Donation::create([
            'user_id' => 2,
            'donation_date' => '2022-12-15',
            'confirm' => 0,
            'blood_type' => 'B-',
            'campaign_id' => 2,
            'medical_unit_id' => 2,
        ]);

        Donation::create([
            'user_id' => 3,
            'donation_date' => '2022-12-20',
            'confirm' => 1,
            'blood_type' => 'O+',
            'campaign_id' => 3,
            'medical_unit_id' => 3,
        ]);

        Donation::create([
            'user_id' => 4,
            'donation_date' => '2022-12-25',
            'confirm' => 0,
            'blood_type' => 'AB+',
            'campaign_id' => 4,
            'medical_unit_id' => 3,
        ]);
    }
}
