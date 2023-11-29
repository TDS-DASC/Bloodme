<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com', ]);

          DB::table('users')->insert([
            'name' => 'AdminPrueba',
            'last_name' => 'nimdA',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
            'blood_type' => 'O+',
            'curp' => '4rewr',
            'birthdate' => '2020/10/10',
            'gender' => 'Helicoptero Apache',
            'donator' => 0,
            'user_type' => 'admin'
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

        DB::table('users')->insert([
            'name' => 'John Doe',
            'last_name' => 'Smith',
            'email' => 'john.smith@example.com',
            'password' => Hash::make('password123'),
            'blood_type' => 'B-',
            'curp' => 'CUXM000101HDFLNS09',
            'birthdate' => '1995/05/15',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'last_name' => 'Johnson',
            'email' => 'jane.johnson@example.com',
            'password' => Hash::make('password456'),
            'blood_type' => 'O+',
            'curp' => 'DUXJ001010MSPRNS07',
            'birthdate' => '1988/08/22',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Alex Rodriguez',
            'last_name' => 'Martinez',
            'email' => 'alex.martinez@example.com',
            'password' => Hash::make('password789'),
            'blood_type' => 'AB+',
            'curp' => 'RAAM000505HSXRSN08',
            'birthdate' => '1990/12/03',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Sara Garcia',
            'last_name' => 'Lopez',
            'email' => 'sara.lopez@example.com',
            'password' => Hash::make('passwordabc'),
            'blood_type' => 'A-',
            'curp' => 'GOXS980215MDFLNS00',
            'birthdate' => '1982/07/10',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos Mendez',
            'last_name' => 'Gomez',
            'email' => 'carlos.gomez@example.com',
            'password' => Hash::make('passwordxyz'),
            'blood_type' => 'O-',
            'curp' => 'MECG990101HDFLNS01',
            'birthdate' => '1999/01/01',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Elena Torres',
            'last_name' => 'Ramirez',
            'email' => 'elena.ramirez@example.com',
            'password' => Hash::make('password123'),
            'blood_type' => 'A+',
            'curp' => 'TORE001010MSPRNS09',
            'birthdate' => '1995/05/15',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Raul Hernandez',
            'last_name' => 'Alvarez',
            'email' => 'raul.alvarez@example.com',
            'password' => Hash::make('password456'),
            'blood_type' => 'B+',
            'curp' => 'HEAR000505HSXRSN08',
            'birthdate' => '1990/12/03',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Laura Sanchez',
            'last_name' => 'Perez',
            'email' => 'laura.perez@example.com',
            'password' => Hash::make('password789'),
            'blood_type' => 'AB-',
            'curp' => 'SAPL980215MDFLNS00',
            'birthdate' => '1982/07/10',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Jose Rodriguez',
            'last_name' => 'Gonzalez',
            'email' => 'jose.gonzalez@example.com',
            'password' => Hash::make('passwordabc'),
            'blood_type' => 'O+',
            'curp' => 'ROGJ990101HDFLNS01',
            'birthdate' => '1999/01/01',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Monica Mendoza',
            'last_name' => 'Santos',
            'email' => 'monica.santos@example.com',
            'password' => Hash::make('passwordxyz'),
            'blood_type' => 'A-',
            'curp' => 'MOMS000505HSXRSN08',
            'birthdate' => '1990/12/03',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Fernando Jimenez',
            'last_name' => 'Rios',
            'email' => 'fernando.rios@example.com',
            'password' => Hash::make('password123'),
            'blood_type' => 'B+',
            'curp' => 'JIRF001010MSPRNS09',
            'birthdate' => '1995/05/15',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Ana Gutierrez',
            'last_name' => 'Hernandez',
            'email' => 'ana.hernandez@example.com',
            'password' => Hash::make('password456'),
            'blood_type' => 'O-',
            'curp' => 'GUHA980215MDFLNS00',
            'birthdate' => '1982/07/10',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Ricardo Perez',
            'last_name' => 'Marquez',
            'email' => 'ricardo.marquez@example.com',
            'password' => Hash::make('password789'),
            'blood_type' => 'A+',
            'curp' => 'PEMR001010MSPRNS09',
            'birthdate' => '1995/05/15',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Isabel Castro',
            'last_name' => 'Guerrero',
            'email' => 'isabel.guerrero@example.com',
            'password' => Hash::make('passwordabc'),
            'blood_type' => 'B-',
            'curp' => 'CAGI000505HSXRSN08',
            'birthdate' => '1990/12/03',
            'gender' => 'female',
            'donator' => 1,
            'user_type' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Martin Ramirez',
            'last_name' => 'Ortega',
            'email' => 'martin.ortega@example.com',
            'password' => Hash::make('passwordxyz'),
            'blood_type' => 'AB+',
            'curp' => 'RAOM990101HDFLNS01',
            'birthdate' => '1999/01/01',
            'gender' => 'male',
            'donator' => 0,
            'user_type' => 'user'
        ]);
    }
}
