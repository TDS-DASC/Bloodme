<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CampaignMedicalUnit;

class CampaignMedicalUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CampaignMedicalUnit::create([
            'campaign_id' => 1,
            'medical_unit_id' => 1,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 2,
            'medical_unit_id' => 2,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 3,
            'medical_unit_id' => 3,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 4,
            'medical_unit_id' => 1,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 5,
            'medical_unit_id' => 2,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 6,
            'medical_unit_id' => 3,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 7,
            'medical_unit_id' => 1,
        ]);
        
        CampaignMedicalUnit::create([
            'campaign_id' => 8,
            'medical_unit_id' => 2,
        ]);
        
    }
}
