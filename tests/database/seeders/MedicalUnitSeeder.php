<?php

namespace Database\Seeders;

use App\Models\MedicalUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medical_unit = new MedicalUnit();
        $medical_unit->name = 'Hospital_1';
        $medical_unit->urlGmaps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3641.954401301838!2d-110.31829989060572!3d24.10309897505757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ae2cc9260538c5%3A0xeba4c83e4e2e088e!2sUniversidad%20Aut%C3%B3noma%20de%20Baja%20California%20Sur%20-%20UABCS!5e0!3m2!1ses-419!2smx!4v1670118743068!5m2!1ses-419!2smx';
        $medical_unit->save();

        $medical_unit = new MedicalUnit();
        $medical_unit->name = 'Hospital_2';
        $medical_unit->urlGmaps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3641.954401301838!2d-110.31829989060572!3d24.10309897505757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ae2cc9260538c5%3A0xeba4c83e4e2e088e!2sUniversidad%20Aut%C3%B3noma%20de%20Baja%20California%20Sur%20-%20UABCS!5e0!3m2!1ses-419!2smx!4v1670118743068!5m2!1ses-419!2smx';
        $medical_unit->save();

        $medical_unit = new MedicalUnit();
        $medical_unit->name = 'Hospital_3';
        $medical_unit->urlGmaps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3641.954401301838!2d-110.31829989060572!3d24.10309897505757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86ae2cc9260538c5%3A0xeba4c83e4e2e088e!2sUniversidad%20Aut%C3%B3noma%20de%20Baja%20California%20Sur%20-%20UABCS!5e0!3m2!1ses-419!2smx!4v1670118743068!5m2!1ses-419!2smx';
        $medical_unit->save();
    }
}
