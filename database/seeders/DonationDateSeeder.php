<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DonationDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donation_dates')->insert([
            'user_id' => '1',
            'campaign_id' => '1',
            'date_donation' => '2022/02/02:00:00:00',
            'nombre_receptor' => "TEST03",
            'medical_unit_id' => '1'
        ]);

        DB::table('donation_dates')->insert([
            'user_id' => '2',
            'campaign_id' => '2',
            'date_donation' => '2022/03/03:00:00:00',
            'nombre_receptor' => "TEST02",
            'medical_unit_id' => '2'
        ]);

        DB::table('donation_dates')->insert([
            'user_id' => '3',
            'campaign_id' => '3',
            'date_donation' => '2023/04/04:00:00:00',
            'nombre_receptor' => "TEST01",
            'medical_unit_id' => '3'
        ]);
    }
}
