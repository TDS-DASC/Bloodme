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
            'user_type' => 'admin'
        ],[
            'name' => 'usuario03',
            'last_name' => 'pruebapero3',
            'email' => 'prueba03@gmail.com',
            'password' => Hash::make('12345'),
            'blood_type' => 'A+',
            'curp' => 'cumj00000000',
            'birthdate' => '2010/10/10',
            'gender' => 'unassigned',
            'donator' => 0,
            'user_type' => 'medical_u'
        ]);

        DB::table('users')->insert([
            'name' => 'usuario02',
            'last_name' => 'prueba',
            'email' => 'prueba@gmail.com',
            'password' => Hash::make('12345'),
            'blood_type' => 'A+',
            'curp' => 'cumj00000000',
            'birthdate' => '2010/10/10',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);
        $this->call(MedicalUnitSeeder::class);
        $this->call(CampaignSeeder::class);
    }
}
