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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => 'nimdA',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'blood_type' => 'O+',
            'curp' => '4rewr',
            'birthdate' => '2020/10/10',
            'gender' => 'Helicoptero Apache',
            'donator' => 0,
        ]);

        $this->call(MedicalUnitSeeder::class);
        $this->call(CampaignSeeder::class);
    }
}
